
<?php

class Form
{

    public function __construct(FormTitle $formTitle, FormAction $formAction, array $formFields)
    {
        $this->formTitle = $formTitle;
        $this->formAction = $formAction;
        $this->setFormFields($formFields);
    }

    public FormTitle $formTitle;
    public FormAction $formAction;
    public array $formFields;

    private function setFormFields(array $formFields)
    {
        foreach ($formFields as $field) {
            if (!$field instanceof FormInput) {
                throw new InvalidArgumentException('All elements of formFields must be instances of FormInput.');
            }
        }
        $this->formFields = $formFields;
    }

    public function render()
    {
        $formTitle = $this->formTitle;
        $formAction = $this->formAction;
        $formFields = $this->formFields;
        include 'templates/FormTemplate.php';;
    }
}
