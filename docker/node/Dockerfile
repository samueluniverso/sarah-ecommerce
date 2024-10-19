FROM node:23.0.0

COPY ./node-afterbuild.sh /app/deploy/
RUN chmod +x /app/deploy/node-afterbuild.sh

WORKDIR /app/sarah-app

EXPOSE 3001
