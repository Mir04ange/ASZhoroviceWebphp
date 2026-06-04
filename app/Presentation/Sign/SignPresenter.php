<?php declare(strict_types=1);

namespace App\Presentation\Sign;

use Nette;
use Nette\Application\UI\Form;

final class SignPresenter extends Nette\Application\UI\Presenter
{
    protected function createComponentSignInForm(): Form
    {
        $form = new Form;
        $form->addText('username', 'Uživatelské jméno:')
            ->setRequired('Prosím vyplňte uživatelské jméno.');

        $form->addPassword('password', 'Heslo:')
            ->setRequired('Prosím vyplňte heslo.');

        $form->addSubmit('send', 'Přihlásit se');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }

    public function signInFormSucceeded(Form $form, \stdClass $data): void
    {
        try {
            $this->getUser()->login($data->username, $data->password);
            $this->redirect('Home:default');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Nesprávné uživatelské jméno nebo heslo.');
        }
    }

    public function actionOut(): void
    {
        $this->getUser()->logout();
        $this->flashMessage('Byli jste odhlášeni.');
        $this->redirect('Home:default');
    }
}
