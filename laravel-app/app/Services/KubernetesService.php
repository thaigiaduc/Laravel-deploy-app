<?php

namespace App\Services;

use RenokiCo\PhpK8s\KubernetesCluster;

class KubernetesService
{
    protected $kubernetesCluster;

    public function __construct(KubernetesCluster $kubernetesCluster)
    {
        $this->kubernetesCluster = $kubernetesCluster;
    }

    public function getCluster()
    {
        return KubernetesCluster::inClusterConfiguration('https://kubernetes.docker.internal:6443')
        ->withToken(env('KUBE_API_TOKEN'))->withCaCertificate(env('KUBE_CA_CERTIFICATE'));
    }
}
