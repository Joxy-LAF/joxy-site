  <div class="row">
    <div class="span12" style="text-align: center;">
      <h1>Applying Joxy to an application</h1>
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
      
      <h3>Applying to a single application</h3>
      <p>To apply Joxy to an application, you can use the general ways that are available in Swing to switch look-and-feels.
        <ul>
          <li><b>Using a command line switch.</b> You can use the command line option <code>-Dswing.defaultlaf=joxy.JoxyLookAndFeel</code> when starting the application to switch the look and feel to Joxy. For example: <pre>java -Dswing.defaultlaf=joxy.JoxyLookAndFeel -jar someprogram.jar</pre></li>
          <li><p><b>Programming it in your application.</b> If you want, you can provide your own applications with the Joxy Look and Feel. This can be done with the following statement: <pre>UIManager.setLookAndFeel("joxy.JoxyLookAndFeel");</pre> Make sure this statement is issued before any GUI component is loaded (even a <code>JFrame</code>), else strange things may happen! You may want to distribute the Joxy JAR file with your program.</p>
          <p><i>Note: by hard-coding the look-and-feel in your program, you take away the user's freedom to choose another one instead. If you want to do this, therefore we suggest that you provide a configuration dialog or file, where the user can pick another look-and-feel. You can see below the trouble of applying Joxy to programs that hard-code another look-and-feel.</i></p></li>
        </ul>
      </p>
      
      <h3>Help for certain programs</h3>
      <p>Some programs set their look-and-feel programmatically, as described above, to another look-and-feel than Joxy. What can you try then (except for modifying the code)?
        <ul>
          <li><p><b>Setting the system look-and-feel to Joxy.</b> You can tell Java that the system look-and-feel should be Joxy. That means, if an application specifically asks to apply the "native looking" look-and-feel, it will pick Joxy. Quite a lot of programs do this. You can use the following command-line option then: <code>-Dswing.systemlaf=joxy.JoxyLookAndFeel</code>.</p>
          <p><i>Note: although this is called the "system" look-and-feel, this will not modify the default look and feel for programs. This only notifies Java that the application should be told that Joxy is the look-and-feel that looks most like the native system. See below (section </i>Advanced settings<i>) for how to make these options permanent, so that Joxy becomes the default look-and-feel for all Java programs.</i></p></li>
          
          <li><p><b>Using an application-specific way.</b> Some applications (especially big ones) have custom ways to set the look-and-feel. Some examples:
            <ul>
              <li><b>Netbeans</b> provides the <code>--laf</code> command line option. So if you start Netbeans using <pre>./netbeans --laf joxy.JoxyLookAndFeel</pre> the look-and-feel will be chosen. (See <a href="https://sourceforge.net/p/joxy/wiki/Netbeans/">this wiki page</a> for more Netbeans-specific tweaks.)</li>
              <li>Many programs (<b>Dr. Java</b>, <b>JOSM</b>, ...) provide a GUI to choose the look-and-feel from a list. Unfortunately you won't find Joxy in there automatically. See the section below (<i>Advanced settings</i>) for information about how to learn Java that it should include <code>joxy.JoxyLookAndFeel</code> in such lists. Then you can just pick Joxy from the list, and it will work.</li>
              <li><b>Matlab</b>'s look-and-feel can be changed using the method described <a href="http://undocumentedmatlab.com/blog/modifying-matlab-look-and-feel/">here</a>. You don't have to try it however for practical purposes; it completely messes up the interface, since Matlab defines all kinds of GUI elements itself.</li>
            </ul>
          </p></li>
        </ul>
      </p>
      
      <h3>Advanced settings</h3>
      <p>More advanced options can be set in the Java Swing defaults file. For example, you can set the <code>swing.defaultlaf=joxy.JoxyLookAndFeel</code> and <code>swing.systemlaf=joxy.JoxyLookAndFeel</code> in this file as the default.</p>
      
      <p>
        If you want this, locate this file.
        <span class="distro debian">On Debian and Ubuntu you can find it in <code>/etc/java-7-openjdk/swing.properties</code> or something like that.</span>
        <span class="distro arch">On Arch Linux, it is advised that you create a file <code>/etc/java-7-openjdk/swing.properties</code> (or something like that) and then link to that file from the <code>$JRE/lib/</code> directory. Here, <code>$JRE</code> is the path to the installed JRE on your system. More instructions on how to locate this directory can be found <a href="<?= APP_PREFIX ?>/documentation/install#arch">here</a>.</span>
        <span class="distro chakra">On Chakra you can find it in <code>/usr/lib/jvm/java-7-openjdk/jre/lib/swing.properties</code> or something like that.</span>
        <span class="distro windows">On Windows, you can find it in <code>C:\Program Files\Java\jre1.7.0_21\lib\swing.properties</code> or something like that.</span>
        If the file doesn't exist yet, you can create it.
      </p>
      <p>Now you can add lines in this file of the format <pre>setting=value</pre> where <code>setting</code> is one of the following.
        <ul>
          <li><b>swing.defaultlaf</b> or <b>swing.systemlaf</b>; these have the same effect as starting Java with the <code>-Dswing.defaultlaf=joxy.JoxyLookAndFeel</code> or <code>-Dswing.systemlaf=joxy.JoxyLookAndFeel</code> options, respectively.</li>
          <li><b>swing.installedlafs</b>; with this option you can set the list of look-and-feels Java knows to be available (such that Joxy will appear in look-and-feel selection lists, for example). The problem is, if you use this setting, you will override any LAF that was in this list by default. So you will have to enumerate all LAFs and append Joxy, for example as follows.
          <span class="distro windows">(This example is for a default Java install on Linux. You will have to search for the list of look-and-feels on Windows / Mac and adjust these lines accordingly.)</span>
<pre>swing.installedlafs=metal,nimbus,motif,gtk,joxy
swing.installedlaf.metal.name=Metal
swing.installedlaf.metal.class=javax.swing.plaf.metal.MetalLookAndFeel
swing.installedlaf.nimbus.name=Nimbus
swing.installedlaf.nimbus.class=com.sun.java.swing.plaf.nimbus.NimbusLookAndFeel
swing.installedlaf.motif.name=CDE/Motif
swing.installedlaf.motif.class=com.sun.java.swing.plaf.motif.MotifLookAndFeel
swing.installedlaf.gtk.name=GTK+
swing.installedlaf.gtk.class=com.sun.java.swing.plaf.gtk.GTKLookAndFeel
swing.installedlaf.joxy.name=Joxy
swing.installedlaf.joxy.class=joxy.JoxyLookAndFeel</pre>
          </li>
        </ul>
      </p>
    </div>
  </div>