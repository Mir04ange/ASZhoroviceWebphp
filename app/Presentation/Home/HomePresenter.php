<?php declare(strict_types=1);

namespace App\Presentation\Home;

use Nette;
use Nette\Utils\FileSystem;
use Nette\Utils\Json;

final class HomePresenter extends Nette\Application\UI\Presenter
{
    private string $wwwDir;

    public function __construct(string $wwwDir)
    {
        parent::__construct();
        $this->wwwDir = $wwwDir;
    }

    public function renderDefault(): void
    {
        $fallbacks = [
            "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=1200&h=600&fit=crop",
            "https://images.unsplash.com/photo-1494976388531-d1058494cdd7?w=1200&h=600&fit=crop",
            "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=1200&h=600&fit=crop",
            "https://images.unsplash.com/photo-1494976388531-d1058494cdd7?w=1200&h=600&fit=crop",
            "https://images.unsplash.com/photo-1552820728-8ac41f1ce891?w=1200&h=600&fit=crop"
        ];

        $carouselJsonPath = $this->wwwDir . '/carousel_images.json';
        $carouselPaths = [];

        if (file_exists($carouselJsonPath)) {
            try {
                $json = Json::decode(FileSystem::read($carouselJsonPath), Json::FORCE_ARRAY);
                if (is_array($json) && count($json) > 0) {
                    $carouselPaths = $json;
                } else {
                    $carouselPaths = $fallbacks;
                }
            } catch (\Exception $e) {
                $carouselPaths = $fallbacks;
            }
        } else {
            $carouselPaths = $fallbacks;
        }

        if (count($carouselPaths) < 5) {
            $carouselPaths = array_pad($carouselPaths, 5, $fallbacks[0]);
        }

        $raceDatePath = $this->wwwDir . '/race_date.txt';
        $raceDate = file_exists($raceDatePath) ? FileSystem::read($raceDatePath) : "2025-01-01";

        $this->template->carouselPaths = $carouselPaths;
        $this->template->raceDate = $raceDate;
        
        // Prozatím prázdné pole pro registrace, dokud nenastavíme DB
        $this->template->registrations = [];
    }
}
