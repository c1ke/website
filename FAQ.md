# Frequently Asked Questions


## `Upgrade to`/`Feature update` or `Update to`/`Cumulative update`?

First of all, `Feature update` entries are **upgrades** and `Cumulative update` entries are **updates**.

The differences are:
 * **Upgrade** builds will have **both** the given cumulative update **and** updates for the installer.
 * **Update** builds will only have the given cumulative update.

If unsure, **always** choose `Feature update`/`Upgrade to` builds.


## Why can't I choose Enterprise/Education/[…]?
You can. Look at the table on the right when selecting editions and choose the **required edition** instead.

After this, choose the "add additional editions" option under "Download method" - select your favorite edition there.


## "There are no languages available for this build." - What does this mean?
This is shown for updates that cannot be made into Windows images.

If you see this on a regular build of Windows, this means it's metadata ESD is unavailable.


## Can I remove packages I don't need before conversion?
You shouldn't. The conversion will most likely fail if you do this.


## There are two builds, one with `(2)` or more next to the name. What does this mean?
Most often that the build was pushed to more than one channel.

Alternatively this could be a build of a different release type that was mistaken for a duplicate.
