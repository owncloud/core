<?php

/* The autosetup.php should be used for automatic setup ownCloud after admin user is created and storage initialized */

/* This line enables HTTPS */
\OC_Config::setValue( "forcessl", true);

/* This line sets VALUE to PARAMETER of the APPLICATION */
\OC_Appconfig::setValue(APPLICATION, PARAMETER, VALUE);

