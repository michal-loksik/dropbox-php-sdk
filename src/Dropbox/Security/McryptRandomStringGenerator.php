<?php
namespace Kunnu\Dropbox\Security;

use Kunnu\Dropbox\Exceptions\DropboxClientException;

/**
 * @inheritdoc
 */
class McryptRandomStringGenerator implements RandomStringGeneratorInterface
{
    use RandomStringGeneratorTrait;

    /**
     * Get a randomly generated secure token
     *
     * @param  int $length Length of the string to return
     *
     * @throws \Kunnu\Dropbox\Exceptions\DropboxClientException
     *
     * @return string
     */
    public function generateString($length)
    {
        //Create Binary String
        try {
            $binaryString = random_bytes($length);
        } catch (\Exception $e) {
            throw new DropboxClientException($e->getMessage());
        }

        //Convert binary to hex
        return $this->binToHex($binaryString, $length);
    }
}
