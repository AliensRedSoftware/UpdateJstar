<?php
namespace app\modules;

use std, gui, framework, app;

class MainModule extends AbstractModule {
    /**
     * @event zip.unpackAll 
     */
    function doZipUnpackAll(ScriptEvent $e = null) {
        $get = trim(file_get_contents('http://s2s5.space/bot/bot/ver'));
        $this->ini->set('version' , $get , 'section');
        $this->ini->set('notification' , true , 'section');
        fs::delete('dist.zip');
        $os = System::getProperty('os.name');
        if ($os == 'Linux') {
            execute('java -jar jstar.jar');
        } else {
            execute('java -jar jstar.exe');
        }
        app()->shutdown();
    }
}
