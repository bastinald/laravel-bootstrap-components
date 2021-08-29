<?php

namespace Bastinald\LaravelBootstrapComponents\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

trait WithModel
{
    public $model = [];
    private $modelCollection;

    public function model()
    {
        if (!$this->modelCollection) {
            $this->modelCollection = collect($this->model);
        }

        return $this->modelCollection;
    }

    public function setModel($key, $value = null)
    {
        if ($key instanceof Model) {
            $key = $key->toArray();
        }

        if (is_array($key)) {
            foreach ($key as $arrayKey => $arrayValue) {
                Arr::set($this->model, $arrayKey, $arrayValue);
            }
        } else {
            Arr::set($this->model, $key, $value);
        }
    }

    public function addModelItem($key)
    {
        $array = $this->getModel($key);
        $arrayKey = $array ? max(array_keys($array)) + 1 : 0;

        Arr::set($this->model, $key . '.' . $arrayKey, null);

        $this->rekeyModelItems($key);
    }

    public function removeModelItem($key, $arrayKey)
    {
        Arr::forget($this->model, $key . '.' . $arrayKey);

        $this->rekeyModelItems($key);
    }

    public function rekeyModelItems($key)
    {
        $this->setModel($key, array_values($this->getModel($key)));
    }

    public function orderModelItem($key, $arrayKey, $direction)
    {
        $arrayValue = $this->getModel($key . '.' . $arrayKey);
        $swapKey = strtolower($direction) == 'up' ? $arrayKey - 1 : $arrayKey + 1;

        if ($swapValue = $this->getModel($key . '.' . $swapKey)) {
            $this->setModel($key . '.' . $arrayKey, $swapValue);
            $this->setModel($key . '.' . $swapKey, $arrayValue);
        }
    }

    public function validateModel($rules = null)
    {
        $validator = Validator::make($this->model, $rules ?? $this->getRules());
        $validatedModel = $validator->validate();

        $this->resetErrorBag();

        return $validatedModel;
    }

    public function updatingModelSearch()
    {
        if (method_exists($this, 'resetPage')) {
            $this->resetPage();
        }
    }
}
