  <div class="row">
    <div class="span12" style="text-align: center;">
      <h1>Downloading Joxy</h1>
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
      
      <h3>As a package</h3>
      <span class="distro arch">
        <p>Joxy is available on the Arch User Repository (AUR) as package <a href="https://aur.archlinux.org/packages/java-swing-joxy-git/">java-swing-joxy-git</a>. This can be easily installed using your favourite AUR helper or manually. If you are unsure please see the Arch wiki regarding the <a href="https://wiki.archlinux.org/index.php/AUR">AUR</a> and the <a href="https://wiki.archlinux.org/index.php/AUR_Helpers">helpers</a>. For completeness I include some brief instructions on how to install from the AUR.</p>

        <p>To manually install from the AUR, download the <a href="https://aur.archlinux.org/packages/ja/java-swing-joxy-git/java-swing-joxy-git.tar.gz">tarball</a> and extract it into its own directory. Then go into the directory where you find the file <code>PKGBUILD</code>. It is always advised at this point to check the <code>PKGBUILD</code> to be sure it is ok and will not harm your computer. Make the package by running:</p>

        <pre>makepkg</pre>

        <p>inside the folder. This will create a pacman package, which is installed using:</p>

        <pre>sudo pacman -U java-swing-joxy-git_<b>someversion</b>.pkg.tar.xz</pre>

        <p>This will install the package on your system. If you installed it manually, don't forget to check for updates because it will require a similar process to manually update. Personally I recommend using a helper for AUR packages.</p>
        
        <p>If you don't want to use this package, for example because you rather want to use a stable version of Joxy, it is of course also possible to get Joxy manually. You can follow the following instructions for that.</p>
      </span>
      <span class="distro chakra">
        <p>For Chakra Linux, Joxy is available as a package in the Chakra Community Repository (CCR).</p>
        
        <p>The package name is <code>joxy-git</code>. See <a href="http://www.chakra-linux.org/ccr/packages.php?O=0&K=joxy-git&do_Search=+Go+">this page</a>. With the package, you will automatically get the latest Git version, which may not be stable.</p>
        
        <p>To install this package, you can use the <code>ccr</code> command:
<pre>ccr -S joxy-git</pre>
        The source code will be automatically compiled, packaged and installed.</p>
        
        <p><b>Note:</b> You might get the following error:
<pre>compile.sh: [EE] Could not find Java home. Looked at:
  [...]
compile.sh: [EE] Please edit ./compile.sh if your Java installation is located somewhere else.
==> ERROR: A failure occurred in build().</pre>
        You can solve this by manually setting the <code>$JAVA_HOME</code> environment variable using <code>export JAVA_HOME=/path/to/jdk</code>, for example:
<pre>export JAVA_HOME='/usr/lib/jvm/java-7-openjdk'</pre>
        and trying again.</p>
        
        <p>If you don't want to use this package, for example because you rather want to use a stable version of Joxy, it is of course also possible to get Joxy manually. You can follow the following instructions for that.</p>
      </span>
      <span class="distro debian">
        <p>For Debian and Ubuntu, there is no package available.</p>
      </span>
      <span class="distro linux">
        <p>For some distributions there are packages available. This is only the case for Arch Linux and Chakra Linux at the moment (as far as we know). Please switch to the instructions for these distributions to get more information about this.</p>
      </span>
      <span class="distro windows">
        <p>For Windows and Mac no package or installer is available; you will have to download and install Joxy yourself. Note that on these platforms Joxy is not very well supported.</p>
      </span>
      
      <h3>Manually</h3>
      <p>You can download precompiled versions of Joxy easily using the <a href="<?= APP_PREFIX ?>/download/">download page</a>. We recommend using the current stable version. We don't have nightly builds at the moment, so if you want to use the development version, you should compile Joxy yourself. See <a href="<?= APP_PREFIX ?>/documentation/compile/">this documentation page</a>.</p>
    </div>
  </div>