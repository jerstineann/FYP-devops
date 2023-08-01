#!/bin/bash

# Start Apache and MySQL
start_services() {
    /opt/lampp/lampp startapache
    /opt/lampp/lampp startmysql
}

# To check if Apache and MySQL are running
check_services() {
    if ! pgrep -x "httpd" || ! pgrep -x "mysqld"; then
        echo "Apache or MySQL is not running. Starting services..."
        start_services
    fi
}

# Check services every 5 seconds
while sleep 5; do
    check_services
done

