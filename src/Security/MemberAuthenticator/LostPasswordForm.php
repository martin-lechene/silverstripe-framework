<?php


namespace SilverStripe\Security\MemberAuthenticator;

use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\TextField;
use SilverStripe\Security\Member;

/**
 * Class LostPasswordForm handles the requests for lost password form generation
 *
 * We need the MemberLoginForm for the getFormFields logic.
 */
class LostPasswordForm extends MemberLoginForm
{

    /**
     * Create a single EmailField form that has the capability
     * of using the MemberLoginForm Authenticator
     *
     * @return FieldList
     */
    public function getFormFields()
    {
        $uniqueIdentifier = Member::config()->get('unique_identifier_field');
        $label = Member::singleton()->fieldLabel($uniqueIdentifier);
        if ($uniqueIdentifier === 'Email') {
            $emailField = EmailField::create('Email', $label);
        } else {
            // This field needs to still be called Email, but we can re-label it
            $emailField = TextField::create('Email', $label);
        }
        return FieldList::create($emailField);
    }

    /**
     * Give the member a friendly button to push
     *
     * @return FieldList
     */
    public function getFormActions()
    {
        return FieldList::create(
            FormAction::create(
                'forgotPassword',
                _t('SilverStripe\\Security\\Security.BUTTONSEND', 'Send me the password reset link')
            )
        );
    }
}
