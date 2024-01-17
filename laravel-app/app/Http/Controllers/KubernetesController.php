<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RenokiCo\PhpK8s\K8s;
use App\Services\KubernetesService;

class KubernetesController extends Controller
{
    protected $k8s;
    protected $kubernetesService;

    public function __construct(KubernetesService $kubernetesService)
    {
        $this->kubernetesService = $kubernetesService;
    }

    public function getAllNamespace()
    {
        $cluster = $this->kubernetesService->getCluster();
        return response()->json([
            'message' => 'Get all namespace',
            'data' => $cluster->getAllNamespaces()
        ], 200);
    }

    public function getPodByName($name)
    {
        $cluster = $this->kubernetesService->getCluster();
        return response()->json([
            'message' => 'Get Pod with name is ' . $name,
            'data' => $cluster->getPodByName($name)
        ], 200);
    }

    public function getAllPod()
    {
        $cluster = $this->kubernetesService->getCluster();
        return response()->json([
            'message' => 'Get all pod in default namespace',
            'data' => $cluster->getAllPod()
        ], 200);
    }

    public function getPodLogs($podName)
    {
        $cluster = $this->kubernetesService->getCluster();
        return response()->json([
            'message' => "Get logs pod name " . $podName,
            'data' => $cluster->getPodLogs($podName)
        ], 200);
    }

    public function getPodDetail($podName)
    {
        $cluster = $this->kubernetesService->getCluster();

        return response()->json([
            'message' => 'Get pod detail name ' . $podName,
            'data' => $cluster->getPodDetail($podName)
        ], 200);
    }

    public function getAllService()
    {
        $cluster = $this->kubernetesService->getCluster();

        return response()->json([
            'message' => 'Get all service in default namespace',
            'data' => $cluster->getAllServices()
        ], 200);
    }

    public function getAllDeployment()
    {
        $cluster = $this->kubernetesService->getCluster();

        return response()->json([
            'message' => 'Get all deployment in default namespace',
            'data' => $cluster->getAllDeployments()
        ], 200);
    }
}
