# Ansible AWX Tower Demo - Varnish load-balanced PHP App

This repository contains a demonstration PHP app that runs with three servers: a Varnish proxy frontend, and two PHP app server backends.

It uses a number of Ansible Galaxy collections and roles, and is meant to demonstrate how to run a playbook and use a dynamic AWS inventory in Ansible AWX or Tower.

The repository was created to demonstrate AWX and Tower for Jeff Geerling's [Ansible 101 video series](https://www.jeffgeerling.com/blog/2020/ansible-101-jeff-geerling-youtube-streaming-series) and [Ansible for DevOps](https://www.ansiblefordevops.com).

## Prerequisites

It is assumed you're running three AWS EC2 instances, running Debian 10. The instances should have the tag `Name` set to:

  - Instance 1: `awx-demo-varnish`
  - Instance 2: `awx-demo-php`
  - Instance 3: `awx-demo-php`

## Usage

Install required Ansible dependencies:

    ansible-galaxy collection install -r requirements.yml
    ansible-galaxy role install -r requirements.yml

> Note: In Ansible 2.10 or later, you can just run: `ansible-galaxy install -r requirements.yml`

Run the playbook:

    ansible-playbook main.yml
