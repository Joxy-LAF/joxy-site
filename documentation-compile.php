  <div class="row">
    <div class="span12" style="text-align: center;">
      <h1>Compiling Joxy</h1>
    </div>
  </div>
  <div class="row">
    <div class="span12">
      <p>Please choose your distribution. The information on this page will be automatically updated then.</p>
      <center>
        <div id="distro-chooser" class="btn-group">
          <a class="btn" id="distro-linux" onclick="updateDistribution('linux')">Linux (generic)</a>
          <a class="btn" id="distro-debian" onclick="updateDistribution('debian')">Debian / Ubuntu</a>
          <a class="btn" id="distro-arch" onclick="updateDistribution('arch')">Arch Linux</a>
          <a class="btn" id="distro-chakra" onclick="updateDistribution('chakra')">Chakra Linux</a>
          <a class="btn" id="distro-windows" onclick="updateDistribution('windows')">Windows / Mac</a>
        </div>
        <div>
          <p class="credits distro arch">The instructions for Arch Linux on this page have been contributed by <a href="http://sourceforge.net/u/decorian/profile/">Dominic</a>. Thanks!</p>
          <p class="credits">Did you spot a mistake, want to have your distribution added to the above list or have other suggestions or questions, please <a href="http://sourceforge.net/p/joxy/discussion/general/thread/158b3905/">let us know</a>!</p>
        </div>
      </center>
      
      <div class="distro windows">
        <h3>Compilation on non-Linux platforms</h3>
        <p>Compiling Joxy is probably possible on Windows and Mac, but we haven't tested this and we don't have specific instructions for those platforms.</p>
      </div>
      
      <div class="distro arch">
        <h3>Before you start</h3>
        <p>Whilst it is possible to manually compile and install yourself, on Arch it is recommended to use the AUR package. This is because using the AUR package means you get the latest <code>git</code> version and you compile it on your own computer anyway. It also means that <code>pacman</code> has control over every file and package installed on your system, even if that package was created by manually compiling a program via an AUR build script.</p>
        <p>If you want to use the package, please continue reading <a href="<?= APP_PREFIX ?>/documentation/download/#arch">here</a>.</p>
      </div>
      
      <div class="distro chakra">
        <h3>Before you start</h3>
        <p>Whilst it is possible to manually compile and install yourself, on Chakra it is recommended to use the CCR package. This is because using the CCR package means you get the latest <code>git</code> version and you compile it on your own computer anyway. It also means that <code>pacman</code> has control over every file and package installed on your system, even if that package was created by manually compiling a program via an CCR build script.</p>
        <p>If you want to use the package, please continue reading <a href="<?= APP_PREFIX ?>/documentation/download/#chakra">here</a>.</p>
      </div>
      
      <div class="distro linux debian arch chakra">
        <h3>Getting the source</h3>
        <p>If you want to compile Joxy yourself, you have to obtain the source from our Git repository. You can access this repository at SourceForge <a target="_blank" href="http://sourceforge.net/p/joxy/code/">here</a>.
        
        <p>To use Git, you will need to have it installed on your computer. This can be done with the package manager of your distribution. <span class="distro debian">For Debian and Ubuntu, the package name is simply <code>git</code>, so use <code>apt-get install git</code> to install it.</span> <span class="distro arch">For Arch Linux, the package name is simply <code>git</code>, so use <code>sudo pacman -Sy git</code> to install it.</span> <span class="distro chakra">For Chakra Linux, the package name is simply <code>git</code>, so use <code>sudo pacman -S git</code> to install it.</span></p>
        
        <p>Then you can create a folder to store the source code in, do this at a location you like. Preferably do not work as the root user: for security reasons we do not recommend to run our code with root privileges.</p>
        
        <p>At the SourceForge repository page, you can get a command to clone the repository to your local computer. At the moment of writing, this command is</p>
        
        <pre>git clone git://git.code.sf.net/p/joxy/code somename</pre>
        
        <p>where <code>somename</code> is the name of the directory to put the source in. Execute this command. Now the source code is available for you to compile in the folder you created.</p>
        
        <h3>Get a specific version of Joxy</h3>
        <p>It may be that you want to compile a specific version of Joxy yourself, for example the latest stable release, or an older release for testing purposes. Now, this is possible by using the tags provided by Git. We use Git tags to identify versions of Joxy. Unfortunately, we figured out how to do this only after having released version 0.0.2, so the first tag available is for version 0.0.3.</p>
        
        <p>The first thing you may want to do, is see what versions you have to choose from. This can be done as follows:</p>
<pre>$ git tag
0.0.3
0.1.0</pre>
        <p>Please note here that the given output is an example, there may be more versions available when you run it.</p>
        
        <p>Now, you can get the code for a version listed by executing <code>$ git checkout [version]</code>. For example, going to version 0.1.0 could look like this:</p>
<pre>$ git checkout 0.1.0
Note: checking out '0.1.0'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by performing another checkout.

If you want to create a new branch to retain commits you create, you may
do so (now or later) by using -b with the checkout command again. Example:

  git checkout -b new_branch_name

HEAD is now at b7cb104... Merge branch 'master' of ssh://git.code.sf.net/p/joxy/code</pre>

        <p>When you are done, you can revert to the newest code as follows:</p>
<pre>$ git checkout master 
Previous HEAD position was b7cb104... Merge branch 'master' of ssh://git.code.sf.net/p/joxy/code
Switched to branch 'master'</pre>
        <p>After executing this, you are up-to-date again. Please refer to the excellent <a target="_blank" href="http://git-scm.com/docs">Git documentation</a> for more details about tagging, checking out and using Git in general.</p>
        
        <h3>Compiling the source code</h3>
        <p>To compile, you will of course need the Java Development Kit. We test Joxy with OpenJDK 7. (OpenJDK 6 will probably work as well, but since Joxy 0.2.0 we do not test on that platform anymore.)</p>
        
        <p>You can compile the source code in two ways.
          <ul>
            <li>Building the project <a href="#using-maven">using Maven</a>. If you have Maven installed, we recommend this way, since it is easier.</li>
            <li>If you do not have Maven, you can also compile the source code <a href="#manually-java">manually</a>.</li>
          </ul>
        </p>
        
        <h3 id="using-maven">Using Maven</h3>
        <p>Maven is a build automation tool, that takes care of the entire compilation and packaging process. Joxy will, since version 0.3.0, be distributed as a Maven project, so you can use Maven to build it.</p>
        
        <p>You will first need to install Maven. Visit <a href="http://maven.apache.org/">the Maven website</a> for more information. <span class="distro debian">(For Debian and Ubuntu, you can also just install the <code>maven</code> package.)</span></p>
        
        <p>Now open a terminal, and go to the <code>joxy</code> folder in the Joxy source tree. Enter the following command:</p>
<pre>mvn package</pre>
        <p>If all goes well, the Joxy JAR file and the library for native text rendering appear in the newly created <code>install</code> folder. You are done now; you can continue on the <a href="<?= APP_PREFIX ?>/documentation/install/">page about installing Joxy</a>.</p>
        
        <h3 id="manually-java">Manually compiling the Java code</h3>
        <p>If you do not want to use Maven, you can of course also compile the source code manually.</p>
        
        <p>You can either import the source code into your IDE of choice (Eclipse or Netbeans for example) to compile it, or use the <code>javac</code> command on the terminal. Compilation should be straightforward, because there are no dependencies except for the core Java libraries (and JUnit if you are compiling the <code>test</code> folder too). To create a JAR file for Joxy, you can use the <code>jar</code> command.</p>
        
        <p>If you don't want to use native text rendering, you are done now and you can continue to the <a href="<?= APP_PREFIX ?>/documentation/install/">page about installing Joxy</a>. Else, please continue to the next section.</p>
        
        <h3>Manually compiling the native text rendering</h3>
        <p>To use native text rendering, you will also have to compile the C++ code in the src folder to a shared library (a *.so file). This can be done using <code>gcc</code>. To this end, we have created a script, <code>compile.sh</code>, in the <code>src</code> folder. The aim of this script is to assist you and make it as easy as possible to enable native text rendering. We are still working on this, so please, if you have suggestions or noted a bug, report this via the <a target="_blank" href="http://sourceforge.net/p/joxy/discussion/">forum</a> on SourceForge.</p>
        
        <p>You will need the Qt 4 development packages before compiling.<span class="distro debian"> For Debian and Ubuntu, this package is called <code>libqt4-dev</code>. Install it using <code>apt-get install libqt4-dev</code> if you don't have it already.</span></p>
        
        <div class="distro arch chakra"><p>Note: we have received reports that on Arch and Chakra the detection of your <code>JAVA_HOME</code> folder may not work. Please set the <code>$JAVA_HOME</code> environment variable to your Java home folder manually in such a case, like this:</p>
<pre>export JAVA_HOME='/usr/lib/jvm/java-7-openjdk'</pre>
        </div>
        
        <p>An example of how to compile the shared library (we suppose the current working directory is the root of the Git repository):</p>
<pre>$ cd joxy/src/main/scripts/
$ ./compile.sh
compile.sh: [I] Multiple Java installations were found:
compile.sh: [I]   [0]: /usr/lib/jvm/java-7-openjdk-amd64
compile.sh: [I]   [1]: /usr/lib/jvm/java-6-openjdk-amd64
compile.sh: [I] Please pick one of these (default is [0]): 
compile.sh: [I] Now compiling...
compile.sh: [I] Done. File '/home/thom/Joxy/joxy-code/joxy/install/libjoxy.so' created.
compile.sh: [I] You should move this file to the Java library path.
compile.sh: [I] Currently, the following directories are present in your Java library path:
compile.sh: [I]   /usr/java/packages/lib/amd64
compile.sh: [I]   /usr/lib/jni
compile.sh: [I]   /lib
compile.sh: [I]   /usr/lib
compile.sh: [I] You should pick one of these folders to move the shared library to.</pre>
        <p>Note that the script presents a list of directories you can put the compiled library in. Further information about this will be given at the <a href="<?= APP_PREFIX ?>/documentation/install/">page about installing Joxy</a>.</p>
      </div>
    </div>
  </div>