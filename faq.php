	<div class="row">
		<div class="span12" style="text-align: center;">
			<h1>Frequently asked questions</h1>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<p>Well... "frequently" asked? We don't receive questions about Joxy often, so on this page we answer some questions we think might be useful.</p>
			
			<h3>The questions</h3>
			
			<p><strong>What is Joxy?</strong><br />
			Joxy is a so-called <em>look-and-feel</em> for Java Swing applications. This look-and-feel mimics the Oxygen theme in use by the KDE desktop. Joxy thus is not a stand-alone program; you can run other programs, for example Netbeans, with this look-and-feel.</p>

			<p><strong>Why is it called Joxy?</strong><br />
			The <em>J</em> is for Java, and <em>oxy</em> is for Oxygen.</p>

			<p><strong>What is that icon for Joxy?</strong><br />
			It is Duke, Java's mascot, sitting on Konqi, KDE's mascot. We made the image by combining 3D models of Duke and Konqi. See the <a href="<?= APP_PREFIX ?>/about/#logo">about page</a>.</p>

			<p><strong>How do I get Joxy?</strong><br />
			You can either download it, or compile it yourself. You can download Joxy <a href="<?= APP_PREFIX ?>/download/">here</a>. If you want to compile Joxy yourself, please read <a href="<?= APP_PREFIX ?>/documentation/download">Downloading Joxy</a> and <a href="<?= APP_PREFIX ?>/documentation/compile">Compiling Joxy</a> in the documentation.</p>

			<p><strong>How do I put Joxy on a program?</strong><br />
			We composed a page with instructions about that here: <a href="<?= APP_PREFIX ?>/documentation/usage">Applying Joxy to an application</a>.</p>

			<p><strong>Is Joxy finished yet?</strong><br />
			No, surely not! The current version is far from being complete and contains bugs. Hence the version number 0.2.0.</p>

			<p><strong>How does the version numbering scheme work?</strong><br />
			The current version is 0.2.0. The first digit is a 0, because Joxy is not stable yet. We just increment the last digit for every new version and if there is a large bugfix release, we increment the middle digit. So the versions with a 0 in the end are meant to be more stable, but in this early development phase we still recommend using the latest version.</p>

			<p><strong>When will the next version of Joxy be released?</strong><br />
			The following Joxy version will probably be 0.2.1. We are not sure when this version will be released.</p>

			<p><strong>How can I help with improving Joxy?</strong><br />
			The best way is probably by testing applications with Joxy, and reporting bugs. If you want to help develop Joxy, please leave a message in the forum, or drop us a line using the SourceForge message facility. You will be more than welcome :-)</p>

			<p><strong>What systems are supported?</strong><br />
			Officially, only KDE systems on Linux are supported at the moment.<br />
			We only test Joxy on two systems (Debian Testing and Chakra), but it should work with other distributions too. If you find problems please report them. Also, if you use another distribution and the installation/compilation instructions are incorrect for this distribution, please <a href="http://sourceforge.net/p/joxy/discussion/general/thread/158b3905/">report</a> that too, so we can change them.</p>

			<p><strong>Will other operating systems be supported in the future?</strong><br />
			Version 0.2.0 should run on other platforms (Windows/Mac/Linux without KDE) too, but we have not tested that very thoroughly. The most important problem is the absence of the Oxygen icons.</p>

			<p><strong>How are widgets rendered?</strong><br />
			The GUI components are painted by pure Java code, it is not delegated to the actual Oxygen C++ code. Joxy is however able to delegate the text rendering to Qt in order to replace the ugly Java font rendering. We took the painting-by-Java approach for several reasons. Firstly we are not very proficient in C++, so it would take us a long time to get it working. Secondly, Qt styles are really different from Java look-and-feels. It would be difficult to match these two. A disadvantage of this approach is obviously that it is very difficult to get the rendering pixel-perfect, and that also isn't quite the case at the moment.</p>

			<h3>Questions about older Joxy versions</h3>
			<p>The following questions do not apply anymore to the current Joxy version.</p>

			<p><strong><span class="faq-version">Joxy 0.0.3</span> &ndash; I'm compiling Joxy, but I don't want/manage to compile in the native text rendering. Now Joxy won't work. What should I do?</strong><br />
			The native text rendering is purely optional. If you don't want to use it, or if you are not able to compile it (please post on our forum then!), you can set in the source code of <code>joxy.utils.JoxyGraphics</code> the variable <code>NATIVE_TEXT_RENDERING</code> to <code>false</code> instead of <code>true</code>. Then Joxy will just use the default Java text rendering. In the future, we want to implement that Joxy switches to Java text rendering automatically if the shared library for the native rendering cannot be found. <div class="faq-answer">This is implemented in Joxy 0.1.0.</div></p>

			<p><strong><span class="faq-version">Joxy 0.0.2</span> &ndash; Why does an application crash when it tries to bring up a JFileChooser?</strong><br />
			JFileChoosers are not implemented yet. <div class="faq-answer">A JFileChooser delegate was implemented in 0.0.3, now applications don't crash anymore.</div></p>
		</div>
	</div>