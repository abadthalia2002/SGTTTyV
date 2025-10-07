<?php

namespace App\Constants;

class ValidationPatterns
{
    public const EMAIL = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    public const PHONE = '/^[0-9]{10}$/';
    public const LETTERS = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ]*$/';
    public const LETTERS_SPACES = '/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/';
    public const NUMBERS_LETTERS = '/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]*$/';
    public const NUMBERS_LETTERS_SPACES = '/^[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ\s]+$/';
    public const NUMBERS = '/^[0-9]+$/';
    public const NUMBERS_LETTERS_SPACES_DASHES = '/^[a-zA-Z0-9\s-]+$/';
    public const NUMBERS_AND_LETTERS_AND_SPACES_AND_DASHES_AND_PARENTHESIS_PATTERN = '/^[a-zA-Z0-9áéíóúÁÉÍÓÚ\s\-()]*$/';
    public const NUMBERS_AND_LETTERS_AND_DASH_AND_UNDERSCORE = '/^[A-Za-z0-9_-]*$/';
    public const LETTERS_SPACES_DASHES_PARENS = '/^[a-zA-ZáéíóúÁÉÍÓÚ\s\-()]*$/';
    public const LETTERS_SPACES_DASHES_PARENS_DOTS = '/^[a-zA-ZáéíóúÁÉÍÓÚ\s\-()\/\\\\]*$/';
    public const COIN_SYMBOL = '/^[a-zA-Z0-9áéíóúÁÉÍÓÚ\s\-()\/\.$]*$/';
    public const URL_PATTERN = '/^(https?:\/\/)?([\w\-]+\.)+[\w\-]+(\/[\w\-._~:\/?#[\]@!$&\'()*+,;=]*)?$/';
}
