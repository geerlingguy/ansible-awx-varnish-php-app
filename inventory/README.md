# Episode 11 - Dynamic inventory examples

These examples illustrate how to manage inventory, build dynamic inventory scripts, and use inventory plugins, like the AWS EC2 inventory plugin.

## `ansible-inventory` cli:

You can get a concise listing of the hosts and groups in an inventory using `ansible-inventory --graph`:

```
ansible-inventory -i inventory/hosts.ini --graph
@all:
  |--@php:
  |  |--184.72.113.99
  |  |--54.84.17.84
  |--@ungrouped:
  |--@varnish:
  |  |--3.85.41.105
```

You can get _all_ the inventory data using `--list`:

```
$ ansible-inventory -i inventory/hosts.ini --list
{
    "_meta": {
        "hostvars": {
            "184.72.113.99": {
                "ansible_ssh_private_key": "~/.ssh/jeffgeerling_aws.pem",
                "ansible_user": "admin"
            },
...
```

And you can get that data in a more human-readable output using `-y` for YAML output instead of JSON.

```
ansible-inventory -i inventory/hosts.ini --list -y
all:
  children:
    php:
      hosts:
        184.72.113.99:
          ansible_ssh_private_key: ~/.ssh/jeffgeerling_aws.pem
          ansible_user: admin
...
```
### Building a Dynamic inventory with PHP

The `inventory-php` script has a hashbang that tells Ansible to run it as a script, using the environment's PHP interpreter. This script can be run standalone, too, for debugging purposes.

> Note: You have to make sure the dynamic inventory script has execute permissions (e.g. `chmod +x`), or you'll get an error like `Problem running script, [Errno 13] Permission denied`.

Test that the inventory works with Ansible by running:

    ansible-inventory -i inventory/inventory-php --list

### Building a Dynamic inventory with Python

The `inventory-python` script is just like the PHP script, but written in Python. The same caveats apply here.

Test that it's working:

    ansible-inventory -i inventory/inventory-python --list

### Using the AWS EC2 dynamic inventory plugin

See: [aws_ec2](https://docs.ansible.com/ansible/latest/plugins/inventory/aws_ec2.html) inventory source.

TODO.

### Using AWS EC2 inventory source in Ansible Tower

See: [Amazon Web Services EC2 Source in Tower Documentation](https://docs.ansible.com/ansible-tower/latest/html/userguide/inventories.html#amazon-web-services-ec2).

Can't demo completely on AWX currently due to [this bug](https://github.com/ansible/awx/issues/6878#issuecomment-637918288).
