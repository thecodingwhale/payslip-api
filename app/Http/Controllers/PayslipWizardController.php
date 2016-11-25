<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Setting;
use App\Template;
use App\TemplateDetail;

class PayslipWizardController extends Controller
{

    public function jsonResponse(array $array)
    {
        return response()->json([
            'data' => $array
        ]);
    }

    public function templates()
    {

        $templates = [];
        foreach (Template::all() as $template) {
            $options = [];
            foreach (Option::all() as $option) {
                $settings = [];
                foreach ($option->settings as $setting) {
                    $detail = TemplateDetail::where([
                        ['template_id',  $template->id],
                        ['option_id',  $option->id],
                        ['setting_id',  $setting->id]
                    ])->first();
                    $settings[] = [
                        'id' => $setting->id,
                        'name' => $setting->name,
                        'value' => $setting->value,
                        'selected' => $detail->selected
                    ];
                }
                $options[] = [
                    'id' => $option->id,
                    'name' => $option->name,
                    'settings' => $settings
                ];
            }
            $templates[] = [
                'id' => $template->id,
                'type' => $template->type,
                'category' => $template->category,
                'selected' => $template->selected,
                'options' => $options
            ];
        }

        return $this->jsonResponse([
            'templates' => $templates
        ]);
    }

}