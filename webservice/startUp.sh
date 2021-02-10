#!/bin/bash
cd /home/webservice/reto2/
git pull origin
cd webService_V1/
php bin/console server:start 192.168.4.96:8000
