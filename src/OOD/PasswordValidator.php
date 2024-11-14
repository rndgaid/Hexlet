<?php

namespace Hexlet\App\IntroductionToOOP\OOD;

class PasswordValidator
{
    private const DEFAULT_MIN_LENGTH = 8;
    private const DEFAULT_CONTAIN_NUMBERS = true;

    /** @var array|mixed[] */
    private array $options;

    /** @param mixed[] $options */
    public function __construct(array $options = [])
    {
        $defaultOptions = [
            'minLength' => self::DEFAULT_MIN_LENGTH,
            'containNumbers' => self::DEFAULT_CONTAIN_NUMBERS
        ];

        $this->options = array_merge($defaultOptions, $options);
    }

    /** @return mixed[] */
    public function validate(string $password): array
    {
        $errors = [];

        $minLenErrs = $this->checkMinLength($password);
        $containNumErrs = $this->checkContainNumbers($password);

        if ($minLenErrs !== null) {
            $errors['minLength'] = $minLenErrs;
        }

        if ($containNumErrs !== null) {
            $errors['containNumbers'] = $containNumErrs;
        }

        return $errors;
    }

    private function checkMinLength(string $password): ?string
    {
        if (mb_strlen($password) < $this->options['minLength']) {
            return 'Password must be at least ' . $this->options['minLength'] . ' characters long';
        }

        return null;
    }

    private function checkContainNumbers(string $password): ?string
    {
        if ($this->options['containNumbers'] && !preg_match('/\d/', $password)) {
            return 'Password must contain at least one number';
        }

        return null;
    }
}

//$valid = new PasswordValidator();
//var_dump($valid->validate('pword'));
