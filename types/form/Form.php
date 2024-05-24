
<?php

class Form
{

    public function __construct(FormTitle $formTitle, FormAction $formAction, array $formFields, bool $validate = true)
    {
        $this->formTitle = $formTitle;
        $this->formAction = $formAction;
        $this->setFormFields($formFields);
        $this->validate = $validate;
    }

    public FormTitle $formTitle;
    public FormAction $formAction;
    public array $formFields;
    public bool $validate;

    private function setFormFields(array $formFields)
    {
        foreach ($formFields as $field) {
            if (!$field instanceof FormInput) {
                throw new InvalidArgumentException('All elements of formFields must be instances of FormInput.');
            }
        }
        $this->formFields = $formFields;
    }

    public function render(string $templateRoute = 'templates/FormTemplate.php')
    {
        $formTitle = $this->formTitle;
        $formAction = $this->formAction;
        $formFields = $this->formFields;
        $validate = $this->validate;
        include $templateRoute;
    }
}
