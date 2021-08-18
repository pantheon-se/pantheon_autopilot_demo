<?php

namespace Drupal\pantheon_autopilot_demo\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a sample notification block.
 *
 * @Block(
 *   id = "pantheon_autopilot_demo_notification",
 *   admin_label = @Translation("PAD Notification"),
 *   category = @Translation("Pantheon Autopilot Demo"),
 *   label_display = false
 * )
 */
class NotificationBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    // Add some custom markup.
    $content = $this->t('Check out our latest blog posts for the latest news!');
    $markup = "<div class='container'>$content</div>";

    return [
      '#markup' => $markup,
      '#attached' => [
        'library' => [
          'pantheon_autopilot_demo/style.block',
        ]
      ],
    ];
  }

}
