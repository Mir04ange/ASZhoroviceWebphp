<?php declare(strict_types=1);

namespace App\Presentation\Registration;

use Nette;
use Nette\Application\UI\Form;

final class RegistrationPresenter extends Nette\Application\UI\Presenter
{
    protected function createComponentRegistrationForm(): Form
    {
        $form = new Form;
        
        // Team
        $form->addText('team', 'Název týmu:');
        
        // Ridic
        $form->addText('ridic_jmeno', 'Jméno řidiče:')
            ->setRequired();
        $form->addText('ridic_narozeni', 'Datum narození:');
        $form->addText('ridic_adresa', 'Adresa:');
        $form->addEmail('ridic_email', 'Email:')
            ->setRequired();
        $form->addText('ridic_telefon', 'Telefon:');
        $form->addText('ridic_licence', 'Licence:');
        
        // Auto
        $form->addText('auto_znacka', 'Značka auta:');
        $form->addText('auto_typ', 'Typ auta:');
        $form->addText('auto_trida', 'Třída:');
        
        $form->addTextArea('info', 'Další informace:');
        
        $form->addCheckbox('souhlas', 'Souhlasím s pravidly')
            ->setRequired('Musíte souhlasit s pravidly.');

        $form->addSubmit('send', 'Odeslat přihlášku');

        $form->onSuccess[] = [$this, 'registrationFormSucceeded'];
        return $form;
    }

    public function registrationFormSucceeded(Form $form, \stdClass $data): void
    {
        // Zde by byla logika pro uložení do DB
        $this->flashMessage('Přihláška byla úspěšně odeslána.', 'success');
        $this->redirect('Home:default');
    }
}
