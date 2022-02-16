<?php

declare(strict_types=1);

namespace App\DesignPatterns\Structural\Bridge\Abstraction;

use App\DesignPatterns\Structural\Bridge\Realisation\WidgetRealizationInterface;

class WidgetSmallAbstraction extends WidgetAbstract
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
            'smallTitle' => $this->getSmallTitle(),
        ];
    }

    private function getSmallTitle(): string
    {
        return mb_substr($this->getRealization()->getTitle(), 0, 5);
    }
}
