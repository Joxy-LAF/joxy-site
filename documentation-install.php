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
			</center>
			
			<h3>Why installing?</h3>
			<p>To enable Java to find the Joxy JAR file, this file should be put in the Java classpath. This can be done in roughly two ways:
				<ul>
					<li>using the <code>-cp</code> command line switch;</li>
					<li>putting the JAR file in the <span class="distro linux debian arch chakra"><code>lib/ext</code></span> <span class="distro windows"><code>lib\ext</code></span> subdirectory of the JRE.</li>
				</ul>
			The first option is rather clumsy, as you will have to start every program with this switch. Furthermore we often have problems with this approach; Java sometimes doesn't seem to recognize the JAR file. Therefore we recommend the second option, that always works.</p>
			
			<h3>Installing the JAR file</h3>
			<p>You will have to find where your JRE is installed. <span class="distro debian">On Debian and Ubuntu, if you installed Java using <code>apt-get</code>, the JRE will be installed in something like (depending on your Java version) <code>/usr/lib/jvm/java-7-openjdk-i386/jre/</code>.</span> <span class="distro arch chakra"><b>To do: specific information for Arch and Chakra.</b></span> <span class="distro windows">For Windows, depending on your installation, the JRE will be in something like <code>C:\Program Files\Java\jre1.6.0_22</code>.</span></p>
			
			<p>Go to this folder and enter the <span class="distro linux debian arch chakra"><code>lib/ext</code></span> <span class="distro windows"><code>lib\ext</code></span> subdirectory. You should now copy the Joxy JAR file to this place. Note: you shouldn't put the JAR file in the <code>lib</code> folder of your JDK instead of the JRE. You can recognize you have the correct path if <code>jre</code> is path of the path name.</p>
			
			<h3>Installing the native text rendering library</h3>
			<span class="distro linux debian arch chakra">
				<p>Now we have the Java code placed in the right directory, we still need to install the shared library containing the native code (the .so file). (This is not obligatory; the shared library only takes care of the native text rendering, and if it cannot be found, Joxy will fallback on default Java text rendering.) You will need to put the .so file in a folder on the Java library path. <span class="distro debian">For Debian/Ubuntu, a safe choice is usually <code>/usr/lib/jni</code>.</span> <span class="distro arch chakra"><b>To do: specific information for Arch and Chakra.</b></span> Tip: if you compiled the library yourself, the <code>compile.sh</code> script gave you a list of directories you can use.</p>
			</span>
			<span class="distro windows">
				<p>Native text rendering is not available for Windows and Mac. (It is also not needed, since Java's text rendering is almost as good as the native ones on these platforms.)</p>
			</span>
		</div>
	</div>