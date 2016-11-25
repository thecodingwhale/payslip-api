<?php

use Illuminate\Database\Seeder;
use App\Option;
use App\TemplateDetail;

class CreateDefaultTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->templateFullWidth();
        $this->templateTwoColumn();
    }

    private function templateFullWidth()
    {
        $template = factory(App\Template::class, 1)->create([
            'type' => 'full-width',
            'category' => 'default',
            'selected' => false
        ]);

        foreach (Option::all() as $option) {
            foreach ($option->settings as $setting) {
                $selected = false;
                if (
                    ($option->id == 1 && $setting->id == 1) ||
                    ($option->id == 1 && $setting->id == 2) ||
                    ($option->id == 1 && $setting->id == 3) ||
                    ($option->id == 1 && $setting->id == 4) ||
                    ($option->id == 2 && $setting->id == 4)
                ) {
                    $selected = true;
                }
                factory(App\TemplateDetail::class, 1)->create([
                    'template_id' => $template->id,
                    'option_id' => $option->id,
                    'setting_id' => $setting->id,
                    'selected' => $selected
                ]);
            }
        }

    }

    private function templateTwoColumn()
    {
        $template = factory(App\Template::class, 1)->create([
            'type' => 'two-column',
            'category' => 'default',
            'selected' => true
        ]);

        foreach (Option::all() as $option) {
            foreach ($option->settings as $setting) {
                $selected = false;
                if (
                    ($option->id == 1 && $setting->id == 1) ||
                    ($option->id == 1 && $setting->id == 2) ||
                    ($option->id == 1 && $setting->id == 3) ||
                    ($option->id == 1 && $setting->id == 4) ||
                    ($option->id == 2 && $setting->id == 4)
                ) {
                    $selected = true;
                }
                factory(App\TemplateDetail::class, 1)->create([
                    'template_id' => $template->id,
                    'option_id' => $option->id,
                    'setting_id' => $setting->id,
                    'selected' => $selected
                ]);
            }
        }
    }

}
