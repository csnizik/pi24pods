# CIGPODS Module

Combining modules `cig_pods` and `cig_pods_csc`

- [CIGPODS Module](#cigpods-module)
  - [File structure](#file-structure)
    - [Root directory](#root-directory)
      - [./cigpods.info.yml](#cigpodsinfoyml)
      - [~~./cigpods.install~~](#cigpodsinstall)
      - [./cigpods.libraries.yml~](#cigpodslibrariesyml)
      - [~~./cigpods.links.action.yml~~](#cigpodslinksactionyml)
      - [~~./cigpods.module~~](#cigpodsmodule)
      - [~~./cigpods.post\_update.php~~](#cigpodspost_updatephp)
      - [./cigpods.routing.yml](#cigpodsroutingyml)
      - [./cigpods.views.inc](#cigpodsviewsinc)
    - [./config/install/](#configinstall)
    - [./css/, ./js/, ./img/](#css-js-img)
    - [./src/Controller/PopupController.php](#srccontrollerpopupcontrollerphp)
    - [./src/Form/](#srcform)
    - [./src/Plugin/Asset/AssetType/](#srcpluginassetassettype)
      - [cig\_pods asset types](#cig_pods-asset-types)
      - [cig\_pods\_csc asset types](#cig_pods_csc-asset-types)
      - [Conflicting asset types](#conflicting-asset-types)
    - [./src/Plugin/Log/{LogType}.php](#srcpluginloglogtypephp)
    - [./src/Plugin/views/argument/](#srcpluginviewsargument)
    - [./src/ProjectAccessControlHandler.php](#srcprojectaccesscontrolhandlerphp)
    - [./templates/html.html.twig](#templateshtmlhtmltwig)
  - [Issues](#issues)
    - [Custom Access Control](#custom-access-control)
      - [Attaching roles to the session](#attaching-roles-to-the-session)
      - [Security risks](#security-risks)
      - [Compatibility problems](#compatibility-problems)
    - [Removal of Drupal's Theming System](#removal-of-drupals-theming-system)
      - [Separation of concerns](#separation-of-concerns)
      - [Asset management](#asset-management)
      - [Caching](#caching)

## File structure

### Root directory

Note: *\* indicates that this file may be added back if needed*

#### ./cigpods.info.yml

- Removed dependencies; can add any back as needed

#### ~~./cigpods.install~~

- <lime>cig_pods only</lime>
- Changes the config for `system.site.page.front` and does some self-updates.

#### ./cigpods.libraries.yml~

- <lime>cig_pods only</lime>
- See [Removal of Drupal's Theming System](#removal-of-drupals-theming-system)

#### ~~./cigpods.links.action.yml~~

- <lime>cig_pods only</lime>
- This file works with Drupal's routing system; defines local actions, which are links/routes. Each link leads to an administrative page.
- Links defined:
  - Add Awardee
  - Add Award
  - Add Field Assessment
  - Add Results
  - Add Soil Test Result
  - Add Method
  - Add Operation
  - Add Pasture Assessment
  - Add Pasture Health Assessment
  - Add Producer
  - Add Rangeland Assessment
  - Add SHMU
  - Add Soil Health Sample

#### ~~./cigpods.module~~

- <lime>cig_pods only</lime>
- Implements hooks:
  - hook_entity_type_alter()
    - Alters entity type definitions
    - Sets custom access handler for `asset` entity type
    - See [Custom Access Control](#custom-access-control)
  - hook_theme_registry_alter()
    - If theme is `gin`, changes path where template files are located for the `html` theme hook
    - Allows module to provide template files to override theme template files
    - See [Removal of Drupal's Theming System](#removal-of-drupals-theming-system)
  - hook_page_attachment()
    - Adds 2 CSS libraries, `hide_return` and `confirm_modal` to all pages
    - See [Removal of Drupal's Theming System](#removal-of-drupals-theming-system)
  - hook_views_pre_render()
    - Targets the view `pods_asset_lists` and attaches different CSS libraries based on the current display of the view.
    - **These libraries should not be defined here, they should be defined in the module's `.libraries.yml` file.**
  - Other functions:
    - cig_pods_cover_crop_terms()
      - Helper function that returns an array of strings representing terms
      - Why are these terms hard-coded here? Are they taxomony terms?

#### ~~./cigpods.post_update.php~~

- Post-update hooks that run after a db update
- cig_pods_post_update_enable_select2()
  - Checks if the select2 module is not installed and installs it
- cig_pods_post_update_field_shmu_experimental_duration_month()
  - Adds a new field for 'Experimental Duration (Months)' to the 'SHMU Experimental Design' section of the 'Asset' entity type.
- cig_pods_post_update_field_shmu_experimental_duration_year()
  - Adds a new field for 'Experimental Duration (Years)' to the 'SHMU Experimental Design' section of the 'Asset' entity type.
- cig_pods_post_update_field_shmu_experimental_frequency_day()
  - Adds a new field for 'Experimental Frequency (Days)' to the 'SHMU Experimental Design' section of the 'Asset' entity type.
- cig_pods_post_update_field_shmu_experimental_frequency_month()
  - Adds a new field for 'Experimental Frequency (Months)' to the 'SHMU Experimental Design' section of the 'Asset' entity type.
- cig_pods_post_update_taxonomy_by_products()
  - Adjusts the name of a specific taxonomy term related to 'Short Term Storage of Animal Waste and By-Products'
- cig_pods_post_update_cover_crop_terms()
  - Adds new terms to a 'Cover Crop' taxonomy vocabulary
- cig_pods_post_update_soil_carbon_amendment()
  - Adds a new term 'Soil Carbon Amendment (336)' to a 'Practice' taxonomy vocabulary
- cig_pods_post_update_soil_ph_terms()
  - Adds new terms related to 'Soil PH Methods' to a specific taxonomy vocabulary.
- cig_pods_post_update_field_lab_method_soil_ph()
  - Adds a new field 'Lab Method Soil PH Method' to the 'Asset' entity type with a reference to the 'Soil PH Method' taxonomy terms
- cig_pods_post_update_field_shmu_experimental_frequency_year()
  - Adds a new field for 'Experimental Frequency (Years)' to the 'SHMU Experimental Design' section of the 'Asset' entity type
- cig_pods_post_update_enable_scss_compiler()
  - Checks if the 'scss_compiler' module is not installed and installs it
- cig_pods_post_update_uninstall_mvp_config()
  - Deletes a range of specified configuration items, likely because they are no longer needed or are being replaced
- cig_pods_post_update_field_assessment_fields()
  - Updates the typing for a set of fields in the 'Field Assessment' entity, includes deleting existing assessments which match a specific criteria, and reinstalling new field definitions
- cig_pods_post_update_delete_lab_profile_entries()
  - Deletes all 'Lab Testing Profile' entries from the database and uninstalls the associated 'Asset Type'
- cig_pods_post_update_award_entity_creation()
  - Creates a new 'Award' entity type with its associated fields and configurations
- cig_pods_post_update_field_contact_award_field()
  - Adds a new 'Award' field to the 'Contact' entity as a reference to the 'Award' asset entity.

#### ./cigpods.routing.yml

<lime>cig_pods:</lime>

- Defines routes to controllers and forms
- Fixed empty `_title` properties
- Added leading `/` to paths
- Fixed typos

<hotpink>cig_pods_csc:</hotpink>

- Defines single route for `/create/workbookdate`

TODO:

- Remove unnecessary duplication of routes (see examples of how other modules handle repeating forms for multiple bundles.) This will need to be followed up with consolidating form controllers.
- Make sure all controllers are in place and correctly namespaced.

#### ./cigpods.views.inc

- <lime>cig_pods only</lime>
- Implements hook_views_data() to register a new argument handler
- Used for contextual filtering?

TODO: Tech discovery on why this is here

### ./config/install/

- Configs for views, taxonomies, asset types, logs, etc.
- Combined all from both projects and changed module name

TODO: Tech discovery: make sure all of these are still being used. Can they be included in config management instead?

### ./css/, ./js/, ./img/

- See [Removal of Drupal's Theming System](#removal-of-drupals-theming-system)

### ./src/Controller/PopupController.php

- <lime>cig_pods only</lime>
- Methods for AJAX requests for opening modal confirmation dialogs

TODO:

- Hard-coded form classes need to be refactored
- Add exception handling (ex. on asset handling, if `$asset_id` is invalid or the asset doesn't exist.)
- Replace direct calls to `\Drupal` services (ex. `\Drupal::entityTypeManager()`) with dependency injection
- Look at [api.drupal.org](https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Ajax%21OpenModalDialogCommand.php/class/OpenModalDialogCommand/10) for docs on `OpenModalDialogCommand`; specifically, why are we not using the `$title` `$options` and `$content` properties?

### ./src/Form/

- <lime>cig_pods only</lime>
- Multiple forms

TODO: Code review of form classes

### ./src/Plugin/Asset/AssetType/

- In both <lime>cig_pods</lime> and <pink>cig_pods_csc</pink>

#### <lime>cig_pods</lime> asset types

- Award.php
- Awardee.php
- Contact.php
- CostSequence.php
- FieldAssessment.php
- Input.php
- Irrigation.php
- LabResult.php
- LabTestingMethod.php
- LabTestingProfile.php
- Operation.php
- PastureAssessment.php
- PastureHealthAssessment.php
- Producer.php
- RangeAssessment.php
- SHMUCropRotation.php
- SoilHealthManagementUnit.php
- SoilHealthSample.php

#### <pink>cig_pods_csc</pink> asset types

- FieldEnrollment.php
- ImportHistory.php
- ProducerEnrollment.php
- PartnerActivities.php
- ProjectSummary.php

#### Conflicting asset types

- Project.php

Separating into two asset types:

- SHProject.php
- CSCProject.php

TODO: Tech discovery on refactoring these into one entity type with a field for 'SH' or 'CSC'

### ./src/Plugin/Log/{LogType}.php

- <pink>cig_pods_csc only</pink>
- Log types
- TODO: code review

### ./src/Plugin/views/argument/

- <lime>cig_pods only</lime>
- See [Custom Access Control](#custom-access-control)

### ./src/ProjectAccessControlHandler.php

- <lime>cig_pods only</lime>
- See [Custom Access Control](#custom-access-control)
- Defines custom access control handler for entities
- Includes methods to integrate with the Views module to alter queries

### ./templates/html.html.twig

- See [Removal of Drupal's Theming System](#removal-of-drupals-theming-system)

## Issues

### Custom Access Control

`ProjectAccessControlHandler.php` defines custom access control handling. It extends `Drupal\entity\UncacheableEntityAccessControlHandler` and it appears to override access checks for creating and interacting with entities.

This approach is significantly outside of Drupal's already robust user and role management system.

#### Attaching roles to the session

We are defining two roles, `isAdmin()` and `isAwardee()` and attaching them to the session. This is bypassing Drupal's well-tested, secure and comprehensive user/permissions systems. Drupal assign roles to *user accounts*, not *sessions*. A session-based approach is outside of Drupal's long-established, supported, and tested functionality.

#### Security risks

Using Drupal's built-in user-based approach gives the assurance of Drupal's data security. Creating an alternate session-based approach does not. Our Drupal sites will be handling secure data. Using sessions means we are risking exposure, and we alone are responsible for making sure it remains secure.

#### Compatibility problems

Other modules (those in Drupal core as well as contributed modules) rely on Drupal's user-based role and permission systems. Replacing it with custom code requires us to create and maintain workarounds so that our code integrates with Drupal.

**TL;DR** Session-based role assignment makes our site more brittle, less secure, and less sustainable.

### Removal of Drupal's Theming System

The PODS-SH and PODS-CSC sites both follow the non-standard approach to theming that the FarmOS distribution uses. In Drupal, themes are the correct place to handle the presentation layer, which includes CSS, JavaScript, and Twig template files.

#### Separation of concerns

Themes maintain the fundamental principle of separation of concerns. While Drupal's modules do allow for some elements of themes to be included in certain circumstances (i.e. a module that adds charts, graphs, diagrams, etc. would include the CSS, JS, and Twig markup for the page elements that it has added), modules are not the intended place for a site's primary theme; they are to be used for functionality, not presentation.

#### Asset management

Themes add their CSS and JS to pages using the render array, which ensures that files are loaded in the right order for performance and caching. Libraries in themes manage and aggregate these assets to ensure that they are loaded not only in the correct order, but only when needed.

Bypassing this system by brute-force adding assets to pages will cause performance issues and can create styling issues that are very difficult to triage.

#### Caching

Drupal's caching system is built around the standard theming workflow. Bypassing the theming layer can create suboptimal caching which affects site performance.

<style>
  lime { color: lime; }
  hotpink { color: hotpink; }
</style>
