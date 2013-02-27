	<div class="row">
		<div class="span12" style="text-align: center;">
			<h1>Compiling Joxy</h1>
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
			</center>
			
			<span class="distro windows">
				<h3>Compilation on non-Linux platforms</h3>
				<p>Compiling Joxy is probably possible on Windows and Mac, but we haven't tested this and we don't have specific instructions for those platforms.</p>
			</span>
			
			<span class="distro linux debian arch chakra">
				<h3>Getting the source</h3>
				<p>If you want to compile Joxy yourself, you have to obtain the source from our Git repository. You can access this repository at SourceForge <a target="_blank" href="http://sourceforge.net/p/joxy/code/">here</a>.
				
				<p>To use Git, you will need to have it installed on your computer. This can be done with the package manager of your distribution. <span class="distro debian">For Debian and Ubuntu, the package name is simply <code>git</code>, so use <code>apt-get install git</code> to install it.</span> <span class="distro arch">For Arch Linux, the package name is simply <code>git</code>, so use <code>pacman -S git</code> to install it. <b>To do: test this.</b></span> <span class="distro chakra">For Chakra Linux, the package name is simply <code>git</code>, so use <code>pacman -S git</code> to install it. <b>To do: test this.</b></span></p>
				
				<p>Then you can create a folder to store the source code in, do this at a location you like. Preferably do not work as the root user: for security reasons we do not recommend to run our code with root privileges.</p>
				
				<p>At the SourceForge repository page, you can get a command to clone the repository to your local computer. At the moment of writing, this command is
				
				<pre>git clone git://git.code.sf.net/p/joxy/code somename</pre>
				
				where <code>somename</code> is the name of the directory to put the source in. Execute this command. Now the source code is available for you to compile in the folder you created.</p>
				
				<h3>Get a specific version of Joxy</h3>
				<p>It may be that you want to compile a specific version of Joxy yourself, for example the latest stable release, or an older release for testing purposes. Now, this is possible by using the tags provided by Git. We use Git tags to identify versions of Joxy. Unfortunately, we figured out how to do this only after having released version 0.0.2, so the first tag available is for version 0.0.3.</p>
				
				<p>The first thing you may want to do, is see what versions you have to choose from. This can be done as follows:
<pre>$ git tag
0.0.3
0.1.0</pre>
				Please note here that the given output is an example, there may be more versions available when you run it.</p>
				
				<p>Now, you can get the code for a version listed by executing <code>$ git checkout [version]</code>. For example, going to version 0.1.0 could look like this:
<pre>$ git checkout 0.1.0
Note: checking out '0.1.0'.

You are in 'detached HEAD' state. You can look around, make experimental
changes and commit them, and you can discard any commits you make in this
state without impacting any branches by performing another checkout.

If you want to create a new branch to retain commits you create, you may
do so (now or later) by using -b with the checkout command again. Example:

  git checkout -b new_branch_name

HEAD is now at b7cb104... Merge branch 'master' of ssh://git.code.sf.net/p/joxy/code</pre></p>

				<p>When you are done, you can revert to the newest code as follows:
<pre>$ git checkout master 
Previous HEAD position was b7cb104... Merge branch 'master' of ssh://git.code.sf.net/p/joxy/code
Switched to branch 'master'</pre>
				After executing this, you are up-to-date again. Please refer to the excellent <a target="_blank" href="http://git-scm.com/docs">Git documentation</a> for more details about tagging, checking out and using Git in general.</p>
				
				<h3>Compiling the Java code</h3>
				<p>The code is divided in two parts.
					<ul>
						<li><code>src</code> contains the actual source code of the look and feel.</li>
						<li><code>test</code> contains some utilities for testing. For example the test GUI resides in this folder. If you are compiling Joxy, you can drop this folder if you don't need these utilities.</li>
					</ul>
				</p>
				
				<p>To compile, you will of course need the Java Development Kit. We test Joxy with the OpenJDK version 6 and 7.</p>
				
				<p>You can either import the source code into your IDE of choice (Eclipse or Netbeans for example) to compile it, or use the <code>javac</code> command on the terminal. Compilation should be straightforward, because there are no dependencies except for the core Java libraries (and JUnit if you are compiling the <code>test</code> folder too). To create a JAR file for Joxy, you can use the <code>jar</code> command.</p>
				
				<p>We intend to provide an Ant script soon, such that compiling will be easier.</p>
				
				<p>To test your compiled code, you can start <code>test.TestGUI</code>. That will launch some GUI that will load Joxy and display some of the many Java Swing components. (This only works if you have compiled the <code>test</code> folder.)</p>
				
				<h3>Compiling the native text rendering</h3>
				<p>To use native text rendering, you will also have to compile the C++ code in the src folder to a shared library (a *.so file). This can be done using <code>gcc</code>. To this end, we have created a little script, <code>compile.sh</code>, in the <code>src</code> folder. The aim of this script is to assist you and make it as easy as possible to enable native text rendering. We are still working on this, so please, if you have suggestions or noted a bug, report this via the <a target="_blank" href="http://sourceforge.net/p/joxy/discussion/">forum</a> on SourceForge.</p>
				
				<p>You will need the Qt 4 development packages before compiling.<span class="distro debian"> For Debian and Ubuntu, this package is called <code>libqt4-dev</code>. Install it using <code>apt-get install libqt4-dev</code> if you don't have it already.</span></p>
				
				<span class="distro arch chakra"><p>Note: we have received reports that on Arch and Chakra the detection of your <code>JAVA_HOME</code> folder doesn't work. Please adjust the script if it doesn't work for you.</p></span>
				
				<p>An example of how to compile the shared library (we suppose the current working directory is the root of the Git repository):
<pre>$ cd src/
$ ./compile.sh
compile.sh: [II] JAVA_HOME='/usr/lib/jvm/java-7-openjdk-amd64'
compile.sh: [II] Now compiling...
compile.sh: [II] Done. File 'libnativeTextRenderer.so' created.
compile.sh: [II] You should move this file to the Java library path.
Currently, the following directories are present in your Java library path:
- /usr/lib/jvm/java-6-openjdk-amd64/jre/lib/amd64/server
- /usr/lib/jvm/java-6-openjdk-amd64/jre/lib/amd64
- /usr/lib/jvm/java-6-openjdk-amd64/jre/../lib/amd64
- /usr/java/packages/lib/amd64
- /usr/lib/x86_64-linux-gnu/jni
- /lib/x86_64-linux-gnu
- /usr/lib/x86_64-linux-gnu
- /usr/lib/jni
- /lib
- /usr/lib
You should pick one of these folders to move the shared library to.</pre>
				Note that the script presents a list of directories you can put the compiled library in. Further information about this will be given at the <a href="<?= APP_PREFIX ?>/documentation/install/">page about installing Joxy</a>.</p>
			</span>
		</div>
	</div>