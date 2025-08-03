<?php

namespace SilverStripe\Security\SudoMode;

use SilverStripe\Control\Session;
use SilverStripe\Core\Config\Configurable;
use SilverStripe\Core\Extensible;
use SilverStripe\ORM\FieldType\DBDatetime;

class SudoModeService implements SudoModeServiceInterface
{
    use Configurable;
    use Extensible;

    /**
     * The lifetime that sudo mode authorization lasts for, in minutes.
     *
     * Note that if the PHP session times out before this lifetime is reached, it will automatically be reset.
     * @see \SilverStripe\Control\Session::$timeout
     */
    private static int $lifetime_minutes = 45;

    /**
     * The session key that is used to store the timestamp for when sudo mode was last activated
     *
     * @var string
     */
    private const SUDO_MODE_SESSION_KEY = 'sudo-mode-last-activated';

    public function check(Session $session): bool
    {
        $active = true;
        $lastActivated = $session->get(SudoModeService::SUDO_MODE_SESSION_KEY);
        if (!$lastActivated) {
            // Not activated at all
            $active = false;
        } else {
            // Activated within the last "lifetime" window
            $nowTimestamp = DBDatetime::now()->getTimestamp();
            $active = $lastActivated > ($nowTimestamp - $this->getLifetime() * 60);
        }
        $this->extend('updateCheck', $active, $session);
        return $active;
    }

    public function activate(Session $session): bool
    {
        $session->set(SudoModeService::SUDO_MODE_SESSION_KEY, DBDatetime::now()->getTimestamp());
        return true;
    }

    public function deactivate(Session $session): void
    {
        $session->set(SudoModeService::SUDO_MODE_SESSION_KEY, null);
    }

    public function getLifetime(): int
    {
        return (int) static::config()->get('lifetime_minutes');
    }
}
