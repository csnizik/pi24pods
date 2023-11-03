# CIGPODS module

**Combining modules `cig_pods` and `cig_pods_csc`**

## File structure

### Root dir

Note: *\* indicates that this file may be added back if needed*

#### ./cigpods.info.yml

- Removed dependencies; can add any back as needed

#### ~~./cigpods.install~~

- This was a file that was only in cig_pods. It changed the config for `system.site.page.front` and did some self-updates.

#### ~~./cigpods.libraries.yml~~*

- cig_pods only

#### ~~./cigpods.links.action.yml~~

- cig_pods only
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

- cig_pods only
- Implements hooks:
  - hook_entity_type_alter()
    - Alters entity type definitions
    - Sets custom access handler for `asset` entity type
  - hook_theme_registry_alter()
    - If theme is `gin`, changes path where template files are located for the `html` theme hook
    - Allows module to provide template files to override theme template files
  - hook_page_attachment()
    - Adds 2 CSS libraries, `hide_return` and `confirm_modal` to all pages
    - **These libraries should not be defined here, they should be defined in the module's `.libraries.yml` file.**
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

**cig_pods**:

- Defines routes to controllers and forms
- Fixed empty `_title` properties
- Added leading `/` to paths
- Fixed typos

**cig_pods_csc**:

- Defines single route for `/create/workbookdate`

TODO:

- Remove unnecessary duplication of routes (see examples of how other modules handle repeating forms for multiple bundles.) This will need to be followed up with consolidating form controllers.
- Make sure all controllers are in place and correctly namespaced.

#### ./cigpods.views.inc

- cig_pods only
- Implements hook_views_data() to register a new argument handler
- Used for contextual filtering?

TODO: Tech discovery on why this is here

### ./config/install/

- Configs for views, taxonomies, asset types, logs, etc.
- Combined all from both projects and changed module name

TODO: Tech discovery: make sure all of these are still being used. Can they be included in config management instead?


