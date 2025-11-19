<?php

class PasswordController
{
    public function index()
    {
        $length        = $_POST['length']        ?? 12;
        $useLower      = isset($_POST['lower']);
        $useUpper      = isset($_POST['upper']);
        $useNumbers    = isset($_POST['numbers']);
        $useSymbols    = isset($_POST['symbols']);
        $generatedPass = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $chars = '';

            if ($useLower) {
                $chars .= 'abcdefghijklmnopqrstuvwxyz';
            }
            if ($useUpper) {
                $chars .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            }
            if ($useNumbers) {
                $chars .= '0123456789';
            }
            if ($useSymbols) {
                $chars .= '!@#$%^&*()-_=+[]{};:,.<>/?';
            }

            if ($chars !== '' && $length > 0) {
                $generatedPass = $this->generatePassword($chars, (int)$length);
            }
        }

        $data = [
            'length'        => $length,
            'useLower'      => $useLower,
            'useUpper'      => $useUpper,
            'useNumbers'    => $useNumbers,
            'useSymbols'    => $useSymbols,
            'generatedPass' => $generatedPass,
        ];

        require __DIR__ . '/../views/password/index.php';
    }

    private function generatePassword(string $chars, int $length): string
    {
        $password = '';
        $maxIndex = strlen($chars) - 1;

        for ($i = 0; $i < $length; $i++) {
            $index = random_int(0, $maxIndex);
            $password .= $chars[$index];
        }

        return $password;
    }
}
