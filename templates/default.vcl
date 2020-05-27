vcl 4.1;
import directors;

backend php1 {
    .host = "{{ groups['php'][0] }}";
}
backend php2 {
    .host = "{{ groups['php'][1] }}";
}

sub vcl_init {
    new app_servers = directors.round_robin();
    app_servers.add_backend(php1);
    app_servers.add_backend(php2);
}

sub vcl_recv {
    # send all traffic to the app_servers director:
    set req.backend_hint = app_servers.backend();
    return(pass);
}
