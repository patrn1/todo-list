FROM nginx:latest

ARG GROUP_ID

RUN getent group ${GROUP_ID} || groupadd -g ${GROUP_ID} www

RUN (getent group ${GROUP_ID} | grep -qw "nginx") || usermod -a -G ${GROUP_ID} nginx