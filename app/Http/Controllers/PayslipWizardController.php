<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Option;
use App\Setting;
use App\Template;

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
            $templates[] = [
                'type' => $template->type,
                'category' => $template->category,
                'selected' => $template->selected,
            ];
        }

        $templates = [
            [
                'id' => 1,
                'category' => 'default',
                'type' => 'two-column',
                'selected' => true,
                'options' => $this->options()
            ],
            [
                'id' => 2,
                'category' => 'default',
                'type' => 'full-width',
                'selected' => false,
                'options' => $this->options()
            ]
        ];

        $templatesCustom = [
            [
                'id' => 1,
                'category' => 'default',
                'type' => 'two-column',
                'selected' => false,
                'options' => $this->options()
            ],
            [
                'id' => 2,
                'category' => 'default',
                'type' => 'full-width',
                'selected' => false,
                'options' => $this->options()
            ],
            [
                'id' => 3,
                'category' => 'custom',
                'type' => 'full-width',
                'selected' => false,
                'options' => $this->options()
            ],
            [
                'id' => 4,
                'category' => 'custom',
                'type' => 'two-column',
                'selected' => true,
                'options' => $this->options()
            ]
        ];

        return $this->jsonResponse([
            'templates' => $templates
        ]);
    }

    public function options()
    {
        $options = [
            [
                'id' => 1,
                'name' => 'Employee Details',
                'settings' => [
                    [
                        'id' => 1,
                        'name' => 'Employee Name',
                        'value' => 'Juan Dela Cruz',
                        'selected' => true
                    ],
                    [
                        'id' => 2,
                        'name' => 'Employee ID',
                        'value' => 'Emp-003',
                        'selected' => true
                    ],
                    [
                        'id' => 3,
                        'name' => 'Gender',
                        'value' => 'June 20, 2014',
                        'selected' => true
                    ],
                    [
                        'id' => 4,
                        'name' => 'Photo',
                        'value' => '',
                        'selected' => true
                    ],
                    [
                        'id' => 5,
                        'name' => 'Birth Date',
                        'value' => 'January 01, 1985',
                        'selected' => false
                    ],
                    [
                        'id' => 6,
                        'name' => 'Mobile',
                        'value' => '09163251796',
                        'selected' => false
                    ],
                    [
                        'id' => 7,
                        'name' => 'Telephone',
                        'value' => '024568254',
                        'selected' => false
                    ],
                    [
                        'id' => 8,
                        'name' => 'Email',
                        'value' => 'juan.delacruz@email.com',
                        'selected' => false
                    ],
                    [
                        'id' => 9,
                        'name' => 'Address',
                        'value' => 'Makati City, PH',
                        'selected' => false
                    ],
                    [
                        'id' => 10,
                        'name' => 'Zip',
                        'value' => '4114',
                        'selected' => false
                    ]
                ]
            ],
            [
                'id' => 2,
                'name' => 'Employment Details',
                'settings' => [
                    [
                        'id' => 1,
                        'name' => 'Rank',
                        'value' => 'Rank and File',
                        'selected' => false
                    ],
                    [
                        'id' => 2,
                        'name' => 'Employment Type',
                        'value' => 'Regular',
                        'selected' => false
                    ],
                    [
                        'id' => 3,
                        'name' => 'Department',
                        'value' => 'Sales Department',
                        'selected' => false
                    ],
                    [
                        'id' => 4,
                        'name' => 'Date Hired',
                        'value' => 'June 01, 2015',
                        'selected' => true
                    ]
                ]
            ],
            [
                'id' => 3,
                'name' => 'Salary Details',
                'settings' => [
                    [
                        'id' => 1,
                        'name' => 'Tax Status',
                        'value' => 'Single',
                        'selected' => false
                    ],
                    [
                        'id' => 2,
                        'name' => 'Hourly Rate',
                        'value' => '600 php/hr',
                        'selected' => false
                    ],
                    [
                        'id' => 3,
                        'name' => 'Payroll Group',
                        'value' => 'Payroll Group A',
                        'selected' => false
                    ],
                    [
                        'id' => 4,
                        'name' => 'Payroll Cycle',
                        'value' => 'Monthly',
                        'selected' => false
                    ],
                    [
                        'id' => 5,
                        'name' => 'Cost Center',
                        'value' => 'Cost Center',
                        'selected' => false
                    ],
                    [
                        'id' => 6,
                        'name' => 'Prepared By',
                        'value' => 'John Doe',
                        'selected' => false
                    ],
                ]
            ],
            [
                'id' => 4,
                'name' => 'Employer Contribution',
                'settings' => [
                    [
                        'id' => 1,
                        'name' => 'SSS',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 2,
                        'name' => 'HDMF',
                        'value' => '50.00',
                        'selected' => true
                    ],
                    [
                        'id' => 3,
                        'name' => 'PhilHealth',
                        'value' => '50.00',
                        'selected' => true
                    ]
                ]
            ],
            [
                'id' => 5,
                'name' => 'Year to Date Figures',
                'settings' => [
                    [
                        'id' => 1,
                        'name' => 'Gross Income',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 2,
                        'name' => 'Taxable Income',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 3,
                        'name' => 'Withholding Tax',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 4,
                        'name' => 'Net Pay',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 5,
                        'name' => 'SSS Employer',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 6,
                        'name' => 'SSS EC Employer',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 7,
                        'name' => 'Gross Income',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 8,
                        'name' => 'PhilHealth Employer',
                        'value' => '92.10',
                        'selected' => true
                    ],
                    [
                        'id' => 9,
                        'name' => 'HDMF Employer',
                        'value' => '92.10',
                        'selected' => true
                    ],
                ]
            ]
        ];
        return $options;
    }
}