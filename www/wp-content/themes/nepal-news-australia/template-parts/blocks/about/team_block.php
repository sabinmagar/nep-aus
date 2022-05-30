<div class="clearfix"></div>
<?php
$teamSectionEnable = get_field('team_enable_section');
if ( $teamSectionEnable ) :
    $teamTitle = get_field('team_title');
    ?>
    <h2><?php echo $teamTitle; ?></h2>
    <?php if ( have_rows('teams') ) : ?>
        <!-- team member -->
        <div class="team-member row">
            <?php 
            $teamsArray = array();
            $teamCount = 1;
            while ( have_rows('teams') ) :
                the_row();
                $memberImage = get_sub_field('member_image');
                if ( $memberImage ) {
                    $memberName = get_sub_field('member_name');
                    $memberDegination = get_sub_field('member_degination');
                    $teamsArray[$teamCount]['content'] = get_sub_field('member_content');
                    $teamsArray[$teamCount]['name'] = $memberName;
                    ?>
                    <div class="col-md-3">
                        <a href="#" data-toggle="modal" data-target="#exampleModal<?php echo $teamCount; ?>">
                            <figure class="member">
                             <img src="<?php echo esc_url( $memberImage['url'] ); ?>" class="img-fluid" alt="<?php echo $memberName; ?>">
                             <figcaption>
                                <h4 class="news-title">
                                    <?php echo $memberName; ?>
                                </h4> 
                                <p><?php echo $memberDegination; ?></p>
                            </figcaption>
                        </figure>
                    </a>
                </div>
                <?php 
            }
            $teamCount++;
        endwhile;
        $teamCount = 1;
        ?>
    </div>
    <?php
endif;
foreach ( $teamsArray as $memberContent ) :
    ?>
    <!-- Modal Info -->
    <div class="modal fade" id="exampleModal<?php echo $teamCount; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg ">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="exampleModalLabel">
                <?php echo $memberContent['name']; ?>
            </h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <?php echo $memberContent['content']; ?>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</div>
<?php
$teamCount++;
endforeach;
endif;