FROM nginx:1.27 AS base

WORKDIR /var/project

RUN nproc
RUN lscpu
RUN ulimit -n

# RUN nginx -V
# RUN nginx -t

# RUN nginx -s reload
# RUN service nginx restart

############################################################################################
FROM base AS local

ADD ./configs/project-nginx.conf /etc/nginx/conf.d/default.conf

############################################################################################
FROM base AS develop

ADD ./configs/project-nginx.conf /etc/nginx/conf.d/default.conf

############################################################################################
FROM base AS production

ADD ./configs/project-nginx-production.conf /etc/nginx/conf.d/default.conf
