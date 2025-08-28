-- 02_detalle_alumno_curso.sql
-- Ejecuta después de crear alumnos y cursos

CREATE TABLE IF NOT EXISTS detalle_alumno_curso (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  alumno_id INT UNSIGNED NOT NULL,
  curso_id INT UNSIGNED NOT NULL,
  creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY uq_alumno_curso (alumno_id, curso_id),
  KEY idx_alumno (alumno_id),
  KEY idx_curso (curso_id),
  CONSTRAINT fk_detalle_alumno FOREIGN KEY (alumno_id)
    REFERENCES alumnos(id) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_detalle_curso FOREIGN KEY (curso_id)
    REFERENCES cursos(id) ON DELETE CASCADE ON UPDATE CASCADE
);
