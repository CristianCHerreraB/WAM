/*Se agrega el campo id_ejecucion a la tabla cal_juez*/
ALTER TABLE cal_juez
ADD COLUMN id_ejecucion INT;

/*login*/
ALTER TABLE [dbo].[usuarios]
ADD
    [user_facebook] VARCHAR(255) NULL,
    [user_instagram] VARCHAR(255) NULL,
    [user_x] VARCHAR(255) NULL,
    [telefono] VARCHAR(20) NULL,
    [genero] VARCHAR(10) NULL,
    [edad] INT NULL;

UPDATE [dbo].[usuarios]
SET
    [user_facebook] = 'no aplica',
    [user_instagram] = 'no aplica',
    [user_x] = 'no aplica',
    [telefono] = 'sin registro',
    [genero] = 'n/a',
    [edad] = 0;

-- 3️⃣ Ahora sí los convertimos a NOT NULL
ALTER TABLE [dbo].[usuarios]
ALTER COLUMN [user_facebook] VARCHAR(255) NOT NULL;

ALTER TABLE [dbo].[usuarios]
ALTER COLUMN [user_instagram] VARCHAR(255) NOT NULL;

ALTER TABLE [dbo].[usuarios]
ALTER COLUMN [user_x] VARCHAR(255) NOT NULL;

ALTER TABLE [dbo].[usuarios]
ALTER COLUMN [telefono] VARCHAR(20) NOT NULL;

ALTER TABLE [dbo].[usuarios]
ALTER COLUMN [genero] VARCHAR(10) NOT NULL;

ALTER TABLE [dbo].[usuarios]
ALTER COLUMN [edad] INT NOT NULL;


/*777 php artisan make:middleware CheckRole*/

  INSERT INTO [dbo].[nivel_usuarios] 
    ([nombre_rol], [created], [active]) 
VALUES 
    ('Admin', GETDATE(), 1);