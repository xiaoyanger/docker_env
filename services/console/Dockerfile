FROM php:7.0
MAINTAINER oomcc <baqianxin@163.com>

WORKDIR /mnt/app

# 常用工具
RUN apt-get update && apt-get install -y git curl wget cron vim locales libfreetype6-dev mariadb-client

# 把语言设置成简体中文
RUN dpkg-reconfigure locales && \
  locale-gen C.UTF-8 && \
  /usr/sbin/update-locale LANG=C.UTF-8
RUN echo 'zh_CN.UTF-8 UTF-8' >> /etc/locale.gen && \
  locale-gen
ENV LC_ALL C.UTF-8
ENV LANG zh_CN.UTF-8
ENV LANGUAGE zh_CN.UTF-8

# 配置 git
RUN git config --global user.name "oomcc" \
  && git config --global user.email "baqianxin@163.com"

# 安装与配置 composer
# Composer 官方安装脚本 https://getcomposer.org/download/
# 因为在国内下载 composer 太慢，我们直接把下载下来的 composer 复制到容器里使用。
COPY ./composer.phar /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
RUN echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> ~/.bashrc \
  && . ~/.bashrc \
  && composer config -g repo.packagist composer https://packagist.phpcomposer.com