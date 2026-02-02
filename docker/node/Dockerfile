FROM node:20.19-alpine AS base

ARG FRONTEND_DIR

WORKDIR /var/project

FROM base AS local

EXPOSE 8090

FROM base AS build-stage

COPY $FRONTEND_DIR/ /var/project

RUN ls -la

#RUN yarn install # --no-progress

FROM build-stage AS develop

EXPOSE 8090

#CMD ["yarn", "dev"]

FROM build-stage AS build

RUN yarn run build

FROM nginx:1.25.1-alpine as production

ADD ./docker/node/project-nginx.conf /etc/nginx/conf.d/default.conf

COPY --from=build /var/project/dist /usr/share/nginx/html

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]
