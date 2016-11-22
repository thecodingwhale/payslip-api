<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return $this->jsonResponse([
            'templates' => $templates
        ]);
    }

    public function layouts()
    {
        $layouts = [
            [
                'id' => 2,
                'name' => 'Full Width Layout',
                'value' => 'full-width',
                'selected' => false,
                'options' => $this->options()
            ],
            [
                'id' => 1,
                'name' => 'Two Column Layout',
                'value' => 'two-column',
                'selected' => true,
                'options' => $this->options()
            ]
        ];
        return $this->jsonResponse([
            'layouts' => $layouts
        ]);
    }

    public function getRandomBoolean() {
        return .01 * rand(0, 100) >= .5;
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
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 2,
                        'name' => 'Employee ID',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 3,
                        'name' => 'Gender',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 4,
                        'name' => 'Photo',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 5,
                        'name' => 'Birth Date',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 6,
                        'name' => 'Mobile',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 7,
                        'name' => 'Telephone',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 8,
                        'name' => 'Email',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 9,
                        'name' => 'Address',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 10,
                        'name' => 'Zip',
                        'selected' => $this->getRandomBoolean()
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
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 2,
                        'name' => 'Employment Type',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 3,
                        'name' => 'Department',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 4,
                        'name' => 'Date Hired',
                        'selected' => $this->getRandomBoolean()
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
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 2,
                        'name' => 'Hourly Rate',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 3,
                        'name' => 'Payroll Group',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 4,
                        'name' => 'Payroll Cycle',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 5,
                        'name' => 'Cost Center',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 6,
                        'name' => 'Prepared By',
                        'selected' => $this->getRandomBoolean()
                    ],
                ]
            ],
            [
                'id' => 4,
                'name' => 'Mandatory Deduction',
                'settings' => [
                    [
                        'id' => 1,
                        'name' => 'SS',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 2,
                        'name' => 'TIN',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 3,
                        'name' => 'HDMF',
                        'selected' => $this->getRandomBoolean()
                    ],
                    [
                        'id' => 4,
                        'name' => 'PhilHealth',
                        'selected' => $this->getRandomBoolean()
                    ],
                ]
            ]
        ];
        return $options;
    }
}

