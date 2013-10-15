  <div class="row">
    <div class="span12" style="text-align: center;">
      <h1>Installing Joxy</h1>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Please choose your distribution. The information on this page will be automatically updated then.</p>
      <center>
        <div class="btn-group">
          <a class="btn" id="distro-linux" onclick="updateDistribution('linux')">Linux (generic)</a>
          <a class="btn" id="distro-debian" onclick="updateDistribution('debian')">Debian / Ubuntu</a>
          <a class="btn" id="distro-arch" onclick="updateDistribution('arch')">Arch Linux</a>
          <a class="btn" id="distro-chakra" onclick="updateDistribution('chakra')">Chakra Linux</a>
          <a class="btn" id="distro-windows" onclick="updateDistribution('windows')">Windows / Mac</a>
        </div>
        <div>
          <p class="credits distro arch">For Arch Linux, <a href="http://sourceforge.net/u/decorian/profile/">Dominic</a> wrote most of the instructions on this page. Thanks!</p>
          <p class="credits">Did you spot a mistake, want to have your distribution added to the above list or have other suggestions or questions, please <a href="http://sourceforge.net/p/joxy/discussion/general/thread/158b3905/">let us know</a>!</p>
        </div>
      </center>
      
      <h3>Why installing?</h3>
      <p>To enable Java to find the Joxy JAR file, this file should be put in the Java classpath. This can be done in roughly two ways:
        <ul>
          <li>using the <code>-cp</code> command line switch;</li>
          <li>putting the JAR file in the <span class="distro linux debian arch chakra"><code>lib/ext</code></span> <span class="distro windows"><code>lib\ext</code></span> subdirectory of the JRE.</li>
        </ul>
      The first option is rather clumsy, as you will have to start every program with this switch. Furthermore we often have problems with this approach; Java sometimes doesn't seem to recognize the JAR file. Therefore we recommend the second option, that always works. See the following instructions.</p>
      
      <h3>Installing the JAR file</h3>
      <p>You will have to find out where your JRE is installed.</p>
      <div class="distro debian"><p>On Debian and Ubuntu, if you installed Java using <code>apt-get</code>, the JRE will be installed in something like (depending on your Java version) <code>/usr/lib/jvm/java-7-openjdk-i386/jre/</code>.</p></div>
      <div class="distro arch"><p>To find out what the location of your JRE is, you first need to find out which JRE you're running. There are many options on Arch Linux, so the simplest way to find which you're using is:</p>

      <pre>pacman -Qs jre</pre>

      <p>This does not need to be run as root because it only queries the local database searching for any package with <code>jre</code> in the title. If this does not find any, try searching for <code>jdk</code> or <code>java</code> (in place of jre). Have a look at the <a href="https://wiki.archlinux.org/index.php/Java">Arch wiki page regarding Java</a> if you're struggling.</p>

      <p>Once you have found the name of the package providing the Java runtime environment, you need to find out where it has placed it. To do this you want to list the files installed by the package. I will use the example of the package <code>jre7-openjdk</code> because that is what's installed on my system.</p>

      <pre>pacman -Ql jre7-openjdk</pre>

      <p>This will output a large list of all files and directories, one per line. You will see one line ending in <code>$SOME_PATH/jre/</code> immediately followed by many lines ending in <code>$SOME_PATH/jre/bin/</code> and <code>$SOME_PATH/jre/lib/</code>. The location of your JRE is the line ending in just <code>$SOME_PATH/jre/</code>. On my system this location is <code>/usr/lib/jvm/java-7-openjdk/jre/</code>, I will refer to this here as <code>$JRE</code>.</p>

      <p>Inside this folder will be <code>$JRE/lib/ext/</code> subdirectory. You then continue following the instructions in the guide.</div>
      <div class="distro chakra"><p><b>To do: specific information for Chakra on how to do this. Do you have that information? Please <a href="http://sourceforge.net/p/joxy/discussion/general/thread/158b3905/">contribute</a>!</b></p></div>
      <div class="distro windows"><p>For Windows, depending on your installation, the JRE will be in something like <code>C:\Program Files\Java\jre1.6.0_22</code>.</p></div>
      
      <p>Go to this folder and enter the <span class="distro linux debian arch chakra"><code>lib/ext</code></span> <span class="distro windows"><code>lib\ext</code></span> subdirectory. You should now copy the Joxy JAR file to this place. Note: you shouldn't put the JAR file in the <code>lib</code> folder of your JDK instead of the JRE, since Java doesn't recognize it then. You can recognize you have the correct path if <code>jre</code> is path of the path name.</p>
      
      <h3>Installing the native text rendering library</h3>
      <span class="distro linux debian arch chakra">
        <p>Now we have the Java code placed in the right directory, we still need to install the shared library containing the native code (the .so file). (This is not obligatory; the shared library only takes care of the native text rendering, and if it cannot be found, Joxy will fallback on default Java text rendering.) You will need to put the .so file in a folder on the Java library path.</p>
        <div class="distro debian"><p>For Debian/Ubuntu, a safe choice is usually <code>/usr/lib/jni</code>.</p></div>
        <div class="distro arch"><p>In the previous section you should have already found <code>$JRE/lib/ext</code> in which to put <code>joxy.jar</code>. In this section we are looking for a folder inside <code>$JRE/lib</code> where it would be appropriate to place the shared library. There should be a folder relevant to your architecture. In my case this is <code>$JRE/lib/amd64/</code>. This folder should already include many library files (all of the form <code>lib*.so</code> with the <code>*</code> replaced by the library name). I placed the file here.</p></div>
        <div class="distro chakra"><p><b>To do: specific information for Chakra on how to do this. Do you have that information? Please <a href="http://sourceforge.net/p/joxy/discussion/general/thread/158b3905/">contribute</a>!</b></p></div>
        
        <p>Tip: if you compiled the library yourself, the <code>compile.sh</code> script gave you a list of directories you can use.</p>
      </span>
      <span class="distro windows">
        <p>Native text rendering is not available for Windows and Mac. (It is also not needed, since Java's text rendering is almost as good as the native ones on these platforms.)</p>
      </span>
    </div>
  </div>