FROM centos:7

RUN echo "include_only=.jp" >>/etc/yum/pluginconf.d/fastestmirror.conf && \
    rpm --import http://ftp.riken.jp/Linux/centos/RPM-GPG-KEY-CentOS-7 && \
    rpm --import http://dl.fedoraproject.org/pub/epel/RPM-GPG-KEY-EPEL-7 && \
    rpm --import http://rpms.famillecollet.com/RPM-GPG-KEY-remi

RUN yum -y install epel-release && \
    yum -y install http://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum-config-manager --enable remi-php72 && \
    yum -y update

RUN yum -y install wget git unzip

RUN yum -y install php php-mbstring php-pdo php-mysqlnd php-dom php-posix

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer global require "laravel/envoy=~1.0"