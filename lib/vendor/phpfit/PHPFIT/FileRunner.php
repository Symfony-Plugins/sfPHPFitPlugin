<?php

require_once 'PHPFIT/Exception/FileIO.php';
require_once 'PHPFIT/Fixture.php';
require_once 'PHPFIT/Parse.php';

class PHPFIT_FileRunner {

    /**
    * running fixture object
    * @var PHPFIT_FileRunner
    */
    private $fixture;

    /**
    * running fixture object
    * @var PHPFIT_Parser
    */
    private $tables;

   /**
    * @var string
    */
    private $input;


    /**
    * run test
    *
    * Process all tables in input file and store result in output file.
    *
    * Example:
    * <pre>
    *  $fr = new FileRunner();
    *  $fr->run( 'infilt.html', 'outfile.html' );
    * </pre>
    *
    * @param string $in path to input file
    * @param string $out path to output file
    * @param string $fixturesDirectory path to fixtures
    * @return string results
    */
    public function run( $in, $out, $fixturesDirectory = null) {

        date_default_timezone_set('UTC');

        // check input file
        if (!PHPFIT_Fixture::fc_incpath('file_exists', $in ) || !PHPFIT_Fixture::fc_incpath('is_readable', $in ) || !$in) {
            throw new PHPFIT_Exception_FileIO( 'Input file does not exist!', $in );
        }

        // check output file
        if (!self::isWritable($out)) {
            throw new PHPFIT_Exception_FileIO( 'Output file is not writable (probably a problem of file permissions)', $out);
        }

        // summary data
        $this->fixture->summary['input file']   = $in;
        $this->fixture->summary['output file']  = $out;
        $this->fixture->summary['input update'] = @date( 'F d Y H:i:s.', filemtime( realpath($in) ) );

        // load input data
        $this->input = file_get_contents($in, true);
        
        $result = $this->process($fixturesDirectory);

        // save output
        file_put_contents($out, $this->tables->toString(), true);

        return $result;
    }

    /**
    * @param string $fixturesDirectory
    * @return string results
    */
    public function process($fixturesDirectory) {
        $this->fixture  = new PHPFIT_Fixture($fixturesDirectory);
        $this->tables = PHPFIT_Parse::create($this->input);
        $this->fixture->doTables( $this->tables );

        return $this->fixture->counts->toString();
    }

    /**
    * @param string $filename
    */
    public static function isWritable($filename) {
        $fp = @fopen($filename, 'wb', true);
        $writable = is_resource($fp);

        if ($writable) {
            fclose($fp);
            return true;
        }

        return false;
    }

}
?>
