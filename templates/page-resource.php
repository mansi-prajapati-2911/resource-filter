<?php /* Template Name: Resource Archive Page */
get_header(); ?>

<section class="resources">
   <div class="container">
      <div class="row">
         <div class="col-12">
            <?php
            $resourceTypeArray = get_terms(array(
               'taxonomy' => 'resource_type',
               'hide_empty' => false
            ));
            $resourceTopicArray = get_terms(array(
               'taxonomy' => 'resource_topic',
               'hide_empty' => false
            ));
            ?>
            <div class="d-flex mb-5 mt-5">
               <?php if ($resourceTypeArray && !empty($resourceTypeArray)) : ?>
                  <select class="form-select resource_type_filter">
                     <option value="" selected>All</option>
                     <?php foreach ($resourceTypeArray as $resourceType) : ?>
                        <option value="<?php echo $resourceType->slug; ?>"><?php echo $resourceType->name; ?></option>
                     <?php endforeach; ?>
                  </select>
               <?php endif; ?>
               <?php if ($resourceTopicArray && !empty($resourceTopicArray)) : ?>
                  <select class="form-select resource_topic_filter">
                     <option value="" selected>All</option>
                     <?php foreach ($resourceTopicArray as $resourceTopic) : ?>
                        <option value="<?php echo $resourceTopic->slug; ?>"><?php echo $resourceTopic->name; ?></option>
                     <?php endforeach; ?>
                  </select>
               <?php endif; ?>
            </div>
         </div>
      </div>
      <div class="row" id="showResources">
         <?php echo renderResourceHtml(); ?>
      </div>
   </div>
</section>

<?php get_footer(); ?>