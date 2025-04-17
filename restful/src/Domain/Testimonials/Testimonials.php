<?php
namespace App\Domain\Testimonials;

use App\Domain\Testimonials\TestimonialsRepository;
use App\Exception\ValidationException;
use App\Utilities\ImageUpload;

/** 
 * Service.
 */
final class Testimonials
{ 
  /**
   * @var TestimonialsRepository
   */
  private $repository;
  /**
   * The constructor.
   *
   * @param TestimonialsRepository $repository The repository
   */
  public function __construct(TestimonialsRepository $repository){
    $this->repository = $repository;
  }
 
  public function addTestimonialDetails($data){
    $result = $this->repository->addTestimonialDetails($data);
    return $result;
  }
  
  public function getAllTestimonials($data){
    $result = $this->repository->getAllTestimonials($data);
    return $result;
  }
 
  public function getTestimonialDetails($data){
    $result = $this->repository->getTestimonialDetails($data);
    return $result;
  }
 
  public function updateTestimonialDetails($data){
    $result = $this->repository->updateTestimonialDetails($data);
    return $result;
  } 

  public function deleteTestimonial($data){
    $result = $this->repository->deleteTestimonial($data);
    return $result;
  }
 


}