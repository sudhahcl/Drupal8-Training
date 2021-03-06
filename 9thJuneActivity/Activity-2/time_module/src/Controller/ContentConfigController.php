<?php

namespace Drupal\time_module\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Database\Database;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Custom configuration controller.
 *
 * @package Drupal\time_module\Controller
 */
class ContentConfigController extends ControllerBase {

  /**
   * Database connection class.
   *
   * @var Drupal\Core\Database\Database
   */
  private $database;

  /**
   * Controller construct.
   */
  public function __construct() {
    $this->database = Database::getConnection();
  }

}
