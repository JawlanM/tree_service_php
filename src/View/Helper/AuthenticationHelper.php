<?php
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

class AuthenticationHelper extends Helper
{
    protected array $_defaultConfig = []; // <- typed as array

    public function __construct(View $view, array $config = [])
    {
        parent::__construct($view, $config);
    }

    /**
     * Check if user is logged in
     */
    public function isLoggedIn(): bool
    {
        $identity = $this->getIdentity();
        return !empty($identity);
    }

    /**
     * Get logged-in user info
     */
    public function getIdentity()
    {
        return $this->_View->getRequest()->getAttribute('identity') ?? null;
    }

    /**
     * Get a property from logged-in user
     */
    public function get(string $property)
    {
        $identity = $this->getIdentity();
        if ($identity && isset($identity->{$property})) {
            return $identity->{$property};
        }
        return null;
    }
}
