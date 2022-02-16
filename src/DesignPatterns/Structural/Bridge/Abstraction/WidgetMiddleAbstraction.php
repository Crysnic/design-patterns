<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Abstraction;

use App\DesignPatterns\Structural\Bridge\Realisation\WidgetRealizationInterface;

class WidgetMiddleAbstraction extends WidgetAbstract
{
    public function run(WidgetRealizationInterface $realization)
    {
        $this->setRealization($realization);

        $viewData = $this->getViewData();
        $this->viewLogic($viewData);
    }

    private function getViewData(): array
    {
        return [
            'id' => $this->getRealization()->getId(),
            'middleTitle' => $this->getMiddleTitle(),
            'description' => $this->getRealization()->getDescription(),
        ];
    }

    private function getMiddleTitle(): string
    {
        return $this->getRealization()->getId().'->'.$this->getRealization()->getTitle();
    }
}
