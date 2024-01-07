# Laravel App

## Build docker image

```
docker compose build
```

## Run container

```
docker compose up -d
```

## Deploy on kubernetes with docker desktop

- Settings->enable kubernetes on docker desktop

```
kubectl config get-contexts
kubectl config use-context docker-desktop
kubectl get nodes
```

## Deploy on kubernetes with minikube

- Download and install minikube
  https://minikube.sigs.k8s.io/docs/start/

## Using kubernetes in docker desktop

```
kubectl apply -f kubernetes/namespace.yaml
kubectl apply -f kubernetes/database.yaml
kubectl apply -f kubernetes/app.yaml
kubectl apply -f kubernetes/webserver.yaml
```

## Checking pods, service, deployment command

```
kubectl get pods -n laravel-deploy-app
kubectl get service -n laravel-deploy-app
kubectl get deploymenyt -n laravel-deploy-app
```

## Ingress

- Install helm
  https://helm.sh/docs/intro/install/

- Using helm to install nginx-ingress-controller

```
helm repo add ingress-nginx https://kubernetes.github.io/ingress-nginx
helm repo update

helm install nginx-ingress ingress-nginx/ingress-nginx -n laravel-deploy-app --set controller.publishService.enabled=true
```

- Apply ingress.yaml
  
```
kubectl apply -f kubernetes/ingress.yaml
```

- Check ingress command

```
kubectl get ingress my-ingress -n laravel-deploy-app
```

- Edit file hosts in local machine (ubuntu)
```
code /etc/hosts
127.0.0.1 your-host.com
```
