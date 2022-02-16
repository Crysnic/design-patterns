<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Abstraction;

use App\DesignPatterns\Structural\Bridge\Realisation\WidgetRealizationInterface;

class WidgetBigAbstraction extends WidgetAbstract
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
            'BIG_TITLE' => $this->getFullTitle(),
            'description' => $this->getRealization()->getDescription(),
        ];
    }

    private function getFullTitle(): string
    {
        return $this->getRealization()->getId().'::::'.$this->getRealization()->getTitle();
    }
}
